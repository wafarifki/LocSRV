(() => {
  "use strict";

  document.documentElement.classList.add("js");

  const finePointerQuery = window.matchMedia("(hover: hover) and (pointer: fine)");
  const header = document.querySelector("[data-site-header]");
  const menuToggle = document.querySelector("[data-menu-toggle]");
  const mobileMenu = document.querySelector("[data-mobile-menu]");
  const menuBackdrop = document.querySelector("[data-menu-backdrop]");
  const scrollProgress = document.querySelector("[data-scroll-progress]");
  const backToTop = document.querySelector("[data-back-to-top]");
  let smoothScrollController = null;
  const smoothScrollEasing = (progress) => Math.min(1, 1.001 - Math.pow(2, -10 * progress));

  const setupSmoothScroll = () => {
    if (smoothScrollController || typeof window.Lenis !== "function") {
      return;
    }

    smoothScrollController = new window.Lenis({
      autoRaf: true,
      smoothWheel: true,
      syncTouch: false,
      wheelMultiplier: 0.88,
    });

    document.documentElement.dataset.smoothScroll = "true";
  };

  setupSmoothScroll();

  const getAnchorTarget = (hash) => {
    if (!hash || hash === "#") {
      return null;
    }

    try {
      return document.getElementById(decodeURIComponent(hash.slice(1)));
    } catch (_) {
      return null;
    }
  };

  const scrollToAnchor = (hash, updateHistory = true) => {
    const target = getAnchorTarget(hash);

    if (!(target instanceof HTMLElement)) {
      return false;
    }

    if (updateHistory) {
      if (window.location.hash === hash) {
        window.history.replaceState(null, "", hash);
      } else {
        window.history.pushState(null, "", hash);
      }
    }

    if (smoothScrollController) {
      smoothScrollController.scrollTo(target, {
        offset: 0,
        duration: 1.15,
        easing: smoothScrollEasing,
      });
    } else {
      const targetTop = target.getBoundingClientRect().top + window.scrollY - 92;
      window.scrollTo({ top: Math.max(0, targetTop), behavior: "smooth" });
    }

    return true;
  };

  document.addEventListener("click", (event) => {
    if (
      event.defaultPrevented ||
      event.button !== 0 ||
      event.metaKey ||
      event.ctrlKey ||
      event.shiftKey ||
      event.altKey ||
      !(event.target instanceof Element)
    ) {
      return;
    }

    const link = event.target.closest("a[href]");

    if (
      !(link instanceof HTMLAnchorElement) ||
      link.hasAttribute("download") ||
      (link.target && link.target !== "_self")
    ) {
      return;
    }

    const destination = new URL(link.href, window.location.href);

    if (destination.origin !== window.location.origin || !destination.hash) {
      return;
    }

    const isCurrentPage =
      destination.pathname === window.location.pathname &&
      destination.search === window.location.search;

    if (isCurrentPage) {
      if (getAnchorTarget(destination.hash)) {
        event.preventDefault();
        scrollToAnchor(destination.hash);
      }
      return;
    }

    event.preventDefault();

    try {
      window.sessionStorage.setItem(
        "locsrv-pending-anchor",
        JSON.stringify({ path: destination.pathname, hash: destination.hash }),
      );
    } catch (_) {}

    destination.hash = "";
    window.location.assign(destination.href);
  });

  const restorePendingAnchor = () => {
    let pendingAnchor = null;

    try {
      pendingAnchor = JSON.parse(window.sessionStorage.getItem("locsrv-pending-anchor") || "null");
    } catch (_) {}

    if (!pendingAnchor || pendingAnchor.path !== window.location.pathname) {
      return;
    }

    try {
      window.sessionStorage.removeItem("locsrv-pending-anchor");
    } catch (_) {}

    window.requestAnimationFrame(() => {
      window.requestAnimationFrame(() => {
        if (scrollToAnchor(pendingAnchor.hash, false)) {
          window.history.replaceState(null, "", pendingAnchor.hash);
        }
      });
    });
  };

  if (document.readyState === "complete") {
    restorePendingAnchor();
  } else {
    window.addEventListener("load", restorePendingAnchor, { once: true });
  }

  window.addEventListener("popstate", () => {
    if (window.location.hash) {
      scrollToAnchor(window.location.hash, false);
    }
  });

  const messages = {
    id: {
      "a11y.skip": "Lewati ke konten utama",
      "a11y.home": "LocSRV, kembali ke beranda",
      "a11y.mainNavigation": "Navigasi utama",
      "a11y.language": "Pilih bahasa",
      "a11y.themeLight": "Gunakan mode terang",
      "a11y.themeDark": "Gunakan mode gelap",
      "a11y.menuOpen": "Buka menu",
      "a11y.menuClose": "Tutup menu",
      "a11y.backToTop": "Kembali ke atas",
      "nav.home": "Beranda",
      "nav.features": "Fitur",
      "nav.workflow": "Cara kerja",
      "nav.stack": "Stack",
      "nav.security": "Keamanan",
      "nav.privacy": "Privasi",
      "actions.downloadShort": "Unduh",
      "actions.downloadWindows": "Unduh untuk Windows",
      "actions.seeHow": "Lihat cara kerjanya",
      "mobile.explore": "Jelajahi LocSRV",
      "mobile.navigation": "Navigasi",
      "mobile.localFirst": "Native Windows · Local-first · Tanpa akun",
      "preferences.title": "Preferensi",
      "preferences.language": "Bahasa",
      "preferences.appearance": "Tampilan",
      "preferences.dark": "Gelap",
      "preferences.light": "Terang",
      "hero.eyebrow": "Windows 10/11 · x64 · Native stack",
      "hero.titleTop": "Dev lokal.",
      "hero.titleMiddle": "Lebih cepat.",
      "hero.titleAccent": "Tanpa ribet.",
      "hero.lead": "Nyalakan server, runtime, database, domain <code>.test</code>, HTTPS, dan terminal dari satu control center yang cepat dan tenang.",
      "hero.workspaceLabel": "Developer workspace",
      "hero.systemReady": "System ready",
      "hero.trustAccount": "Tanpa akun wajib",
      "hero.trustPath": "Tidak mengubah global PATH",
      "hero.trustLocal": "Data tetap lokal",
      "hero.stageReady": "Workspace lokal siap",
      "hero.metricNativeText": "Tanpa lapisan container",
      "hero.metricToolsText": "Satu control center",
      "hero.metricLocalText": "Project tetap milikmu",
      "privacy.back": "Kembali ke beranda",
      "privacy.eyebrow": "Transparansi & kendali lokal",
      "privacy.titleTop": "Kebijakan",
      "privacy.titleAccent": "Privasi.",
      "privacy.intro": "Dokumen ini menjelaskan bagaimana aplikasi desktop LocSRV untuk Windows menangani informasi saat kamu menginstal dan menggunakannya.",
      "privacy.document": "Dokumen privasi",
      "privacy.signalLabel": "Prinsip utama",
      "privacy.signalTitle": "Local-first sejak awal.",
      "privacy.signalText": "Tanpa akun wajib, iklan, atau telemetry penerbit.",
      "privacy.publisher": "Penerbit",
      "privacy.effective": "Berlaku sejak",
      "privacy.date": "11 Agustus 2026",
      "privacy.application": "Aplikasi",
      "privacy.tocLabel": "Daftar isi",
      "privacy.sectionNavigation": "Bagian kebijakan",
      "privacy.toc": "Di halaman ini",
      "privacy.tocSummary": "Ringkasan",
      "privacy.tocLocal": "Data lokal",
      "privacy.tocNetwork": "Komunikasi jaringan",
      "privacy.tocAccess": "Akses perangkat",
      "privacy.tocRetention": "Retensi & penghapusan",
      "privacy.tocContact": "Kontak",
      "privacy.website": "Website",
      "privacy.support": "Dukungan",
      "footer.tagline": "Lingkungan pengembangan web lokal yang terstruktur untuk Windows.",
      "footer.product": "Produk",
      "footer.support": "Dukungan",
      "footer.focus": "Dibuat untuk developer yang ingin tetap fokus.",
      "meta.privacyDescription": "Kebijakan Privasi untuk aplikasi desktop LocSRV di Windows.",
    },
    en: {
      "a11y.skip": "Skip to main content",
      "a11y.home": "LocSRV, back to home",
      "a11y.mainNavigation": "Main navigation",
      "a11y.language": "Choose language",
      "a11y.themeLight": "Use light mode",
      "a11y.themeDark": "Use dark mode",
      "a11y.menuOpen": "Open menu",
      "a11y.menuClose": "Close menu",
      "a11y.backToTop": "Back to top",
      "nav.home": "Home",
      "nav.features": "Features",
      "nav.workflow": "How it works",
      "nav.stack": "Stack",
      "nav.security": "Security",
      "nav.privacy": "Privacy",
      "actions.downloadShort": "Download",
      "actions.downloadWindows": "Download for Windows",
      "actions.seeHow": "See how it works",
      "mobile.explore": "Explore LocSRV",
      "mobile.navigation": "Navigation",
      "mobile.localFirst": "Native Windows · Local-first · No account",
      "preferences.title": "Preferences",
      "preferences.language": "Language",
      "preferences.appearance": "Appearance",
      "preferences.dark": "Dark",
      "preferences.light": "Light",
      "hero.eyebrow": "Windows 10/11 · x64 · Native stack",
      "hero.titleTop": "Local dev.",
      "hero.titleMiddle": "Moves faster.",
      "hero.titleAccent": "Zero friction.",
      "hero.lead": "Run servers, runtimes, databases, <code>.test</code> domains, HTTPS, and terminals from one fast, focused control center.",
      "hero.workspaceLabel": "Developer workspace",
      "hero.systemReady": "System ready",
      "hero.trustAccount": "No account required",
      "hero.trustPath": "No global PATH changes",
      "hero.trustLocal": "Your data stays local",
      "hero.stageReady": "Local workspace ready",
      "hero.metricNativeText": "No container layer",
      "hero.metricToolsText": "One control center",
      "hero.metricLocalText": "Your projects stay yours",
      "privacy.back": "Back to home",
      "privacy.eyebrow": "Transparency & local control",
      "privacy.titleTop": "Privacy",
      "privacy.titleAccent": "Policy.",
      "privacy.intro": "This document explains how the LocSRV Windows desktop application handles information when you install and use it.",
      "privacy.document": "Privacy document",
      "privacy.signalLabel": "Core principle",
      "privacy.signalTitle": "Local-first by design.",
      "privacy.signalText": "No required account, ads, or publisher telemetry.",
      "privacy.publisher": "Publisher",
      "privacy.effective": "Effective date",
      "privacy.date": "August 11, 2026",
      "privacy.application": "Application",
      "privacy.tocLabel": "Table of contents",
      "privacy.sectionNavigation": "Policy sections",
      "privacy.toc": "On this page",
      "privacy.tocSummary": "Summary",
      "privacy.tocLocal": "Local data",
      "privacy.tocNetwork": "Network communication",
      "privacy.tocAccess": "Device access",
      "privacy.tocRetention": "Retention & deletion",
      "privacy.tocContact": "Contact",
      "privacy.website": "Website",
      "privacy.support": "Support",
      "footer.tagline": "A structured local web development environment for Windows.",
      "footer.product": "Product",
      "footer.support": "Support",
      "footer.focus": "Built for developers who want to stay focused.",
      "meta.privacyDescription": "Privacy Policy for the LocSRV Windows desktop application.",
    },
  };

  const textTranslations = [
    ["Workspace overview", "Workspace overview"],
    ["Selamat datang kembali.", "Welcome back."],
    ["Web server", "Web server"],
    ["Active version", "Active version"],
    ["Project", "Project"],
    ["HTTPS ready", "HTTPS ready"],
    ["Local services", "Local services"],
    ["Semua berjalan di loopback", "Everything runs on loopback"],
    ["Kelola", "Manage"],
    ["Local domain", "Local domain"],
    ["Package integrity", "Package integrity"],
    ["SHA-256 verified", "SHA-256 verified"],
    ["Performa Windows tanpa lapisan container", "Native Windows performance without a container layer"],
    ["9+ tools", "9+ tools"],
    ["Runtime, server, database, dan utilitas", "Runtimes, servers, databases, and utilities"],
    ["Project dan credential tetap milikmu", "Your projects and credentials stay yours"],
    ["Satu workspace, lebih sedikit distraksi", "One workspace, fewer distractions"],
    ["Semua alat penting.", "Every essential tool."],
    ["Tetap terasa sederhana.", "Still remarkably simple."],
    ["LocSRV menyatukan pekerjaan yang biasanya tersebar di installer, file konfigurasi, terminal, dan Task Manager—tanpa menyembunyikan apa yang sebenarnya terjadi.", "LocSRV brings work normally scattered across installers, config files, terminals, and Task Manager into one place—without hiding what is actually happening."],
    ["Package manager", "Package manager"],
    ["Stack sesuai kebutuhanmu.", "A stack shaped around your work."],
    ["Pilih versi runtime dan service yang dibutuhkan. Unduhan berlangsung lewat HTTPS dan diverifikasi sebelum diaktifkan.", "Choose the runtime and service versions you need. Downloads use HTTPS and are verified before activation."],
    ["Service control", "Service control"],
    ["Status yang bisa dipahami sekilas.", "Status you can understand at a glance."],
    ["Start, stop, health check, port, uptime, dan log berada di tempat yang sama. Tidak perlu menebak proses mana yang masih berjalan.", "Start, stop, health checks, ports, uptime, and logs live together. No more guessing which process is still running."],
    ["Domain lokal yang terasa nyata.", "Local domains that feel production-ready."],
    ["Gunakan", "Use"],
    [", virtual host, dan sertifikat HTTPS lokal dengan perubahan sistem yang selalu meminta konfirmasi.", ", virtual hosts, and local HTTPS certificates, with confirmation before every system change."],
    ["Quick project", "Quick project"],
    ["Dari ide ke workspace aktif.", "From idea to a running workspace."],
    ["Mulai project PHP, Laravel, Symfony, WordPress, Django, React, Next.js, atau static site dengan recipe yang tervalidasi.", "Start a PHP, Laravel, Symfony, WordPress, Django, React, Next.js, or static project with validated recipes."],
    ["Terminal yang tahu konteks project.", "A terminal that knows your project context."],
    ["Buka PowerShell, CMD, atau sesi SSH tervalidasi dengan working directory dan runtime PATH yang sesuai profile aktif.", "Open PowerShell, CMD, or a validated SSH session with the right working directory and runtime PATH for the active profile."],
    ["Data lokal, tetap terkendali.", "Local data, firmly under control."],
    ["Buat database, simpan credential di Windows Credential Manager, lalu backup dan restore dengan CLI native dari engine pilihanmu.", "Create databases, store credentials in Windows Credential Manager, then back up and restore with your engine's native CLI."],
    ["Alur yang masuk akal", "A workflow that makes sense"],
    ["Setup lokal dalam tiga langkah yang jelas.", "A clear local setup in three steps."],
    ["Setiap langkah memberi tahu apa yang akan diunduh, ditulis, atau dijalankan. Tidak ada konfigurasi sistem yang terjadi diam-diam.", "Every step tells you what will be downloaded, written, or run. No system configuration happens silently."],
    ["Susun stack-mu", "Compose your stack"],
    ["Pilih package", "Choose packages"],
    ["Instal web server, runtime, database, dan tool dari katalog terverifikasi.", "Install a web server, runtime, database, and tools from a verified catalog."],
    ["Buat atau deteksi project", "Create or detect a project"],
    ["Gunakan recipe baru atau hubungkan project yang sudah ada di workspace.", "Use a new recipe or connect an existing project to the workspace."],
    ["Jalankan dengan percaya diri", "Run with confidence"],
    ["Aktifkan domain, HTTPS, service, terminal, lalu pantau semuanya dari dashboard.", "Enable domains, HTTPS, services, and terminals, then monitor everything from the dashboard."],
    ["Satu aplikasi, banyak cara bekerja.", "One application, many ways to work."],
    ["Coba susun contoh stack. Pilihan ini hanya pratinjau interaktif dan tidak mengubah perangkatmu.", "Compose a sample stack. This is only an interactive preview and does not change your device."],
    ["Tool tambahan", "Additional tools"],
    ["Development profile", "Development profile"],
    ["Web workspace", "Web workspace"],
    ["Siap dijalankan secara lokal", "Ready to run locally"],
    ["Kontrol tetap ada di tanganmu.", "You stay in control."],
    ["LocSRV dirancang untuk mengelola development environment tanpa menjadikan project dan credential sebagai produk sampingan.", "LocSRV manages your development environment without turning your projects and credentials into someone else's product."],
    ["Baca kebijakan privasi", "Read the privacy policy"],
    ["Download terverifikasi", "Verified downloads"],
    ["Package menggunakan HTTPS dan checksum SHA-256 yang ditentukan katalog.", "Packages use HTTPS and catalog-defined SHA-256 checksums."],
    ["Perubahan sistem selalu terlihat", "System changes stay visible"],
    ["Hosts, local CA, penghapusan data, dan public tunnel membutuhkan konfirmasi.", "Hosts, local CA, data deletion, and public tunnels require confirmation."],
    ["Credential memakai penyimpanan Windows", "Credentials use Windows storage"],
    ["Password database dan token tunnel disimpan melalui Windows Credential Manager.", "Database passwords and tunnel tokens are stored through Windows Credential Manager."],
    ["Tanpa telemetry publisher", "No publisher telemetry"],
    ["Tidak ada iklan, akun cloud wajib, atau pengiriman source code ke server LocSRV.", "No ads, mandatory cloud account, or source-code uploads to a LocSRV server."],
    ["Pertanyaan umum", "Common questions"],
    ["Hal yang perlu kamu tahu sebelum mulai.", "What you should know before starting."],
    ["Masih menemukan masalah? Laporkan melalui GitHub Issues agar dapat ditelusuri dengan konteks yang cukup.", "Still having an issue? Report it through GitHub Issues so it can be investigated with enough context."],
    ["Buka pusat dukungan", "Open support center"],
    ["Apakah LocSRV membutuhkan Docker?", "Does LocSRV require Docker?"],
    ["Tidak. LocSRV menjalankan runtime dan service Windows secara native di dalam struktur direktori yang dikelolanya.", "No. LocSRV runs Windows runtimes and services natively inside its managed directory structure."],
    ["Apakah Apache, PHP, dan database sudah ada di installer?", "Are Apache, PHP, and databases bundled in the installer?"],
    ["Tidak. Package pihak ketiga diunduh hanya setelah kamu memilih Install, lalu diverifikasi sebelum diekstrak dan diaktifkan.", "No. Third-party packages are downloaded only after you choose Install, then verified before extraction and activation."],
    ["Di mana LocSRV menyimpan data?", "Where does LocSRV store data?"],
    ["Build terinstal menyimpan data yang dapat berubah di folder", "Installed builds store mutable data in the"],
    ["di bawah direktori instalasi. Lokasi aktual selalu ditampilkan pada wizard dan Settings.", "folder under the installation directory. The actual location is always shown in the wizard and Settings."],
    ["Apakah domain lokal dan HTTPS mengubah Windows?", "Do local domains and HTTPS change Windows?"],
    ["Jika kamu mengaktifkannya, LocSRV dapat memperbarui hosts file dan menambahkan local CA ke certificate store pengguna. Tindakan tersebut selalu meminta konfirmasi lebih dahulu.", "If enabled, LocSRV can update the hosts file and add a local CA to the user certificate store. These actions always ask for confirmation first."],
    ["Apakah project bisa dibagikan ke internet?", "Can a project be shared on the internet?"],
    ["Bisa melalui Cloudflare Quick Tunnel. Fitur ini bersifat opsional, membutuhkan cloudflared, dan menampilkan peringatan sebelum endpoint lokal dibuka untuk akses publik.", "Yes, through Cloudflare Quick Tunnel. It is optional, requires cloudflared, and displays a warning before a local endpoint becomes public."],
    ["Siap merapikan local development?", "Ready to simplify local development?"],
    ["Bangun web. Bukan setup environment.", "Build the web. Not the environment."],
    ["Mulai dengan LocSRV untuk Windows dan susun stack yang benar-benar sesuai dengan cara kerjamu.", "Start with LocSRV for Windows and compose a stack that truly fits the way you work."],
    ["Unduh LocSRV", "Download LocSRV"],
    ["Produk", "Product"],
    ["Dukungan", "Support"],
    ["Privasi", "Privacy"],

    ["Ringkasan privasi", "Privacy summary"],
    ["LocSRV tidak mewajibkan akun, tidak memuat iklan, serta tidak menyertakan analytics atau telemetry yang dioperasikan penerbit.", "LocSRV does not require an account, does not include advertising, and does not include publisher-operated analytics or telemetry."],
    ["File project, konfigurasi, credential, log, sertifikat lokal, isi database, dan aktivitas terminal tidak dikirim ke penerbit LocSRV atau server yang dikendalikan penerbit.", "Project files, configuration, credentials, logs, local certificates, database content, and terminal activity are not sent to the LocSRV publisher or a publisher-controlled server."],
    ["Komunikasi jaringan hanya terjadi ketika diminta pengguna atau dibutuhkan fitur yang diaktifkan, seperti mengunduh package, terhubung melalui SSH, memeriksa pembaruan, atau menjalankan Cloudflare Tunnel.", "Network communication occurs only when requested by the user or required by an enabled feature, such as downloading packages, connecting through SSH, checking for updates, or starting a Cloudflare Tunnel."],
    ["Ruang lingkup", "Scope"],
    ["Kebijakan ini berlaku untuk aplikasi desktop LocSRV di Windows serta website dan halaman dukungan resminya.", "This policy applies to the LocSRV Windows desktop application and its official website and support pages."],
    ["Package dan layanan yang kamu pilih untuk dipasang atau dihubungkan memiliki kebijakan privasi dan ketentuannya sendiri.", "Packages and services that you choose to install or connect to have their own privacy policies and terms."],
    ["Informasi yang diproses LocSRV secara lokal", "Information LocSRV processes locally"],
    ["LocSRV memproses dan menyimpan informasi di perangkatmu untuk mengelola development environment lokal. Bergantung pada fitur yang digunakan, informasi ini dapat mencakup:", "LocSRV processes and stores information on your device to manage your local development environment. Depending on the features you use, this may include:"],
    ["Preferensi aplikasi, termasuk bahasa, tema, lokasi workspace, terminal, editor, startup, pola domain, pembaruan, dan retensi log.", "Application preferences, including language, theme, workspace paths, terminal, editor, startup, domain patterns, updates, and log retention."],
    ["Nama dan lokasi project, domain development lokal, konfigurasi web server, runtime, port, serta development profile.", "Project names and paths, local development domains, web-server configuration, runtimes, ports, and development profiles."],
    ["Environment variable pada development profile beserta nilainya; semuanya tetap berada di file profile lokal.", "Development-profile environment variables and their values; all remain in locally stored profile files."],
    ["Metadata package, progres download, integrity hash, runtime yang terpasang, dan konfigurasi development tool.", "Package metadata, download progress, integrity hashes, installed runtimes, and development-tool configuration."],
    ["Output service lokal, log aplikasi, laporan diagnostik yang disanitasi, backup database, serta file dari fitur yang kamu gunakan.", "Local service output, application logs, sanitized diagnostic reports, database backups, and files created by features you use."],
    ["Nama profile SSH, hostname atau alamat IP, port, username, metode autentikasi, dan lokasi private key lokal opsional.", "SSH profile names, hostnames or IP addresses, ports, usernames, authentication methods, and an optional local private-key path."],
    ["Username dan credential database lokal, token Cloudflare Tunnel yang sengaja disimpan, serta sertifikat HTTPS lokal.", "Local database usernames and credentials, intentionally saved Cloudflare Tunnel tokens, and local HTTPS certificates."],
    ["Credential dan private key", "Credentials and private keys"],
    ["Password database dan token Cloudflare Tunnel disimpan melalui Windows Credential Manager.", "Database passwords and Cloudflare Tunnel tokens are stored through Windows Credential Manager."],
    ["Password SSH dimasukkan secara interaktif melalui Windows OpenSSH dan tidak disimpan LocSRV.", "SSH passwords are entered interactively through Windows OpenSSH and are not saved by LocSRV."],
    ["LocSRV hanya menyimpan lokasi private key SSH yang dipilih; isinya tidak disalin atau diunggah.", "LocSRV stores only the selected SSH private-key path; its contents are not copied or uploaded."],
    ["Private key sertifikat yang dibuat secara lokal tetap berada di perangkat dan tidak dikirim ke penerbit.", "Locally generated certificate private keys remain on the device and are not sent to the publisher."],
    ["Informasi yang tidak dikumpulkan LocSRV", "Information LocSRV does not collect"],
    ["LocSRV tidak dengan sengaja mengirim hal berikut kepada penerbit:", "LocSRV does not intentionally send the following to the publisher:"],
    ["Source code project atau konten websitemu.", "Your project source code or website content."],
    ["Isi database atau backup database.", "Your database contents or database backups."],
    ["Perintah terminal atau isi sesi SSH.", "Your terminal commands or SSH session contents."],
    ["Password, access token, atau private key.", "Your passwords, access tokens, or private keys."],
    ["Sertifikat lokal atau private key sertifikat.", "Your local certificates or certificate private keys."],
    ["Kontak, foto, kamera, mikrofon, atau lokasi presisi.", "Your contacts, photos, camera, microphone, or precise location."],
    ["Advertising identifier atau data pelacakan lintas aplikasi.", "Advertising identifiers or cross-application tracking data."],
    ["LocSRV tidak menjual informasi pribadi dan tidak membagikannya kepada jaringan iklan atau data broker.", "LocSRV does not sell personal information and does not share it with advertising networks or data brokers."],
    ["Komunikasi jaringan dan pihak ketiga", "Network communication and third parties"],
    ["Beberapa fitur LocSRV berkomunikasi dengan sistem pihak ketiga untuk menyediakan fitur yang kamu minta atau aktifkan.", "Some LocSRV features communicate with third-party systems to provide a feature you request or enable."],
    ["Download package", "Package downloads"],
    ["Saat kamu memasang package, LocSRV mengunduhnya melalui HTTPS dari penerbit atau distribution host yang tercantum. Host tersebut dapat memproses informasi jaringan biasa seperti alamat IP, waktu request, dan protocol header. LocSRV memverifikasi package dengan checksum SHA-256 sebelum instalasi.", "When you install a package, LocSRV downloads it over HTTPS from its listed publisher or distribution host. That host may process ordinary network information such as your IP address, request time, and protocol headers. LocSRV verifies the package with a SHA-256 checksum before installation."],
    ["Pembaruan", "Updates"],
    ["Jika signed update dikonfigurasi dan pemeriksaan otomatis aktif, LocSRV dapat menghubungi update service melalui HTTPS. Pemeriksaan otomatis dapat dinonaktifkan dari pengaturan.", "If signed updates are configured and automatic checks are enabled, LocSRV may contact the update service over HTTPS. Automatic checks can be disabled in Settings."],
    ["Jika kamu menjalankan public tunnel, LocSRV membuka", "If you start a public tunnel, LocSRV launches"],
    ["dan mengirim traffic melalui Cloudflare. Penanganannya mengikuti", "and sends traffic through Cloudflare. Its handling is governed by the"],
    ["Kebijakan Privasi Cloudflare", "Cloudflare Privacy Policy"],
    ["Koneksi SSH", "SSH connections"],
    ["Saat sesi SSH dimulai, Windows OpenSSH terhubung langsung ke server tujuan. Server dan operatornya dapat memproses data autentikasi, perintah, dan traffic sesuai kebijakan mereka.", "When an SSH session starts, Windows OpenSSH connects directly to the destination server. The server and its operator may process authentication data, commands, and traffic under their own policies."],
    ["Layanan Microsoft dan GitHub", "Microsoft services and GitHub"],
    ["Microsoft dapat memproses informasi saat kamu memperoleh LocSRV dari Microsoft Store atau saat Windows memasang pembaruan. Website dan repository dukungan LocSRV dihosting GitHub; masing-masing layanan tunduk pada kebijakan privasinya sendiri.", "Microsoft may process information when you obtain LocSRV through the Microsoft Store or when Windows installs updates. The LocSRV website and support repository are hosted by GitHub; each service is governed by its own privacy policy."],
    ["Akses perangkat dan perubahan sistem", "Device access and system changes"],
    ["LocSRV membutuhkan akses ke file dan proses lokal untuk berfungsi sebagai pengelola development environment. Bergantung pada tindakanmu, LocSRV dapat:", "LocSRV needs access to local files and processes to function as a development-environment manager. Depending on your actions, it may:"],
    ["Membuat, membaca, memperbarui, dan menghapus file di direktori LocSRV.", "Create, read, update, and delete files in LocSRV directories."],
    ["Membaca atau memperbarui direktori project yang kamu pilih.", "Read or update project directories you select."],
    ["Menjalankan dan menghentikan proses development lokal.", "Start and stop local development processes."],
    ["Mengunduh dan memasang runtime yang kamu pilih.", "Download and install runtimes you select."],
    ["Mengubah Windows hosts file setelah konfirmasi dan elevation prompt.", "Modify the Windows hosts file after confirmation and an elevation prompt."],
    ["Membuat serta mempercayai local development CA setelah konfirmasi.", "Create and trust a local development CA after confirmation."],
    ["Menambah atau menghapus startup entry pengguna saat pengaturannya diubah.", "Add or remove a user startup entry when its setting changes."],
    ["Membuka service lokal ke publik hanya setelah konfirmasi tunnel.", "Expose a local service publicly only after tunnel confirmation."],
    ["LocSRV tidak memasang device driver non-Microsoft. Development server berjalan sebagai user-mode process, bukan Windows NT service.", "LocSRV does not install non-Microsoft device drivers. Development servers run as user-mode processes rather than Windows NT services."],
    ["Log dan diagnostik", "Logs and diagnostics"],
    ["Log aplikasi dan service disimpan secara lokal. LocSRV melakukan sanitasi untuk menyamarkan field umum seperti password, token, secret, dan authorization dari informasi diagnostik.", "Application and service logs are stored locally. LocSRV sanitizes diagnostic information to redact common password, token, secret, and authorization fields."],
    ["Laporan diagnostik dan export log tidak diunggah otomatis. File hanya meninggalkan perangkat jika kamu membagikannya secara manual.", "Diagnostic reports and log exports are not uploaded automatically. They leave your device only if you share them manually."],
    ["Tinjau file diagnostik sebelum dibagikan. Lokasi project, hostname, detail konfigurasi, dan output tool pihak ketiga masih dapat mengidentifikasi environment-mu.", "Review diagnostic files before sharing them. Project paths, hostnames, configuration details, and third-party tool output may still identify your environment."],
    ["Retensi dan penghapusan", "Retention and deletion"],
    ["Data LocSRV tetap berada di perangkat hingga kamu menghapusnya melalui kontrol aplikasi atau menghapus file terkait. Pengaturan retensi dapat otomatis menghapus log atau backup lama.", "LocSRV data remains on your device until you remove it through application controls or delete the related files. Retention settings may automatically remove older logs or backups."],
    ["Menghapus instalasi aplikasi mungkin tidak menghapus project, database, backup, credential, sertifikat, atau data development buatan pengguna. Tinjau dan hapus item tersebut secara manual saat tidak lagi dibutuhkan.", "Uninstalling the application may not delete projects, databases, backups, credentials, certificates, or user-created development data. Review and remove these items manually when no longer needed."],
    ["Credential database dan token tunnel dapat dihapus melalui LocSRV. Informasi lokal lainnya dapat dihapus melalui tindakan yang relevan atau dengan menghapus data directory setelah semua proses LocSRV dihentikan.", "Database credentials and tunnel tokens can be removed through LocSRV. Other local information can be removed through the relevant action or by deleting the data directory after all LocSRV processes have stopped."],
    ["Komunikasi dukungan", "Support communications"],
    ["Jika kamu menghubungi penerbit, mengirim issue, menulis Store review, atau membagikan laporan diagnostik, konten tersebut diproses hanya untuk merespons, menyelidiki masalah, menjaga keamanan, dan memperbaiki LocSRV.", "If you contact the publisher, submit an issue, write a Store review, or share a diagnostic report, that content is processed only to respond, investigate the issue, maintain security, and improve LocSRV."],
    ["GitHub Issues bersifat publik. Jangan kirim password, private key, access token, source code privat, export database, atau informasi rahasia lainnya.", "GitHub Issues are public. Do not post passwords, private keys, access tokens, private source code, database exports, or other confidential information."],
    ["Privasi anak", "Children's privacy"],
    ["LocSRV adalah developer tool dan tidak ditujukan secara khusus untuk anak-anak. Penerbit tidak dengan sengaja mengumpulkan informasi pribadi anak melalui aplikasi.", "LocSRV is a developer tool and is not directed specifically at children. The publisher does not knowingly collect children's personal information through the application."],
    ["Perubahan kebijakan", "Changes to this policy"],
    ["Kebijakan ini dapat diperbarui ketika fitur atau metode distribusi LocSRV berubah. Tanggal berlaku di bagian atas halaman akan diperbarui jika ada perubahan material.", "This policy may be updated when LocSRV features or distribution methods change. The effective date at the top of the page will be updated when material changes are published."],
    ["Kontak", "Contact"],
    ["Untuk pertanyaan privasi atau dukungan, hubungi penerbit melalui:", "For privacy or support questions, contact the publisher through:"],
  ];

  const flatTextTranslations = new Map();
  textTranslations.forEach(([id, en]) => {
    const entry = { id, en };
    flatTextTranslations.set(id, entry);
    flatTextTranslations.set(en, entry);
  });

  const textNodeState = new WeakMap();
  const normalizeText = (value) => value.trim().replace(/\s+/g, " ");
  const getMessage = (key, language = document.documentElement.dataset.lang || "id") =>
    messages[language]?.[key] ?? messages.id[key] ?? key;

  const updateThemeControls = () => {
    const language = document.documentElement.dataset.lang === "en" ? "en" : "id";
    const theme = document.documentElement.dataset.theme === "light" ? "light" : "dark";
    const nextThemeLabel = theme === "dark" ? getMessage("a11y.themeLight", language) : getMessage("a11y.themeDark", language);

    document.querySelectorAll("[data-theme-toggle]").forEach((button) => {
      button.setAttribute("aria-label", nextThemeLabel);
      button.querySelector("[data-theme-label]")?.replaceChildren(
        getMessage(theme === "dark" ? "preferences.dark" : "preferences.light", language),
      );
    });
  };

  const applyLanguage = (language, persist = true) => {
    const nextLanguage = language === "en" ? "en" : "id";
    document.documentElement.lang = nextLanguage;
    document.documentElement.dataset.lang = nextLanguage;

    document.querySelectorAll("[data-i18n]").forEach((element) => {
      element.textContent = getMessage(element.dataset.i18n, nextLanguage);
    });
    document.querySelectorAll("[data-i18n-html]").forEach((element) => {
      element.innerHTML = getMessage(element.dataset.i18nHtml, nextLanguage);
    });
    document.querySelectorAll("[data-i18n-aria-label]").forEach((element) => {
      element.setAttribute("aria-label", getMessage(element.dataset.i18nAriaLabel, nextLanguage));
    });
    document.querySelectorAll("[data-i18n-content]").forEach((element) => {
      element.setAttribute("content", getMessage(element.dataset.i18nContent, nextLanguage));
    });

    const walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT);
    let node = walker.nextNode();
    while (node) {
      const parent = node.parentElement;
      const skip = parent?.closest("script, style, [data-i18n], [data-i18n-html], [data-no-i18n]");
      if (!skip) {
        if (!textNodeState.has(node)) {
          const raw = node.nodeValue ?? "";
          textNodeState.set(node, {
            source: normalizeText(raw),
            leading: raw.match(/^\s*/)?.[0] ?? "",
            trailing: raw.match(/\s*$/)?.[0] ?? "",
          });
        }
        const state = textNodeState.get(node);
        const translation = flatTextTranslations.get(state.source);
        if (translation) {
          node.nodeValue = `${state.leading}${translation[nextLanguage]}${state.trailing}`;
        }
      }
      node = walker.nextNode();
    }

    document.querySelectorAll("[data-language]").forEach((button) => {
      button.setAttribute("aria-pressed", String(button.dataset.language === nextLanguage));
    });

    if (menuToggle instanceof HTMLButtonElement) {
      const menuIsOpen = menuToggle.getAttribute("aria-expanded") === "true";
      menuToggle.setAttribute("aria-label", getMessage(menuIsOpen ? "a11y.menuClose" : "a11y.menuOpen", nextLanguage));
    }

    const page = document.documentElement.dataset.page;
    if (page === "privacy") {
      document.title = nextLanguage === "en" ? "LocSRV Privacy Policy" : "Kebijakan Privasi LocSRV";
    } else {
      document.title = nextLanguage === "en"
        ? "LocSRV — Local development for Windows"
        : "LocSRV — Lingkungan development lokal untuk Windows";
    }

    updateThemeControls();
    if (persist) {
      try { localStorage.setItem("locsrv-language", nextLanguage); } catch (_) {}
    }
  };

  const applyTheme = (theme, persist = true) => {
    const nextTheme = theme === "light" ? "light" : "dark";
    if (persist) {
      document.documentElement.setAttribute("data-theme-switching", "");
    }
    document.documentElement.dataset.theme = nextTheme;
    document.querySelector("[data-theme-color]")?.setAttribute("content", nextTheme === "light" ? "#f5f7fb" : "#05080d");
    updateThemeControls();

    if (persist) {
      try { localStorage.setItem("locsrv-theme", nextTheme); } catch (_) {}
      window.requestAnimationFrame(() => {
        window.requestAnimationFrame(() => document.documentElement.removeAttribute("data-theme-switching"));
      });
    }
  };

  applyTheme(document.documentElement.dataset.theme, false);
  applyLanguage(document.documentElement.dataset.lang, false);

  document.addEventListener("click", (event) => {
    const languageButton = event.target instanceof Element ? event.target.closest("[data-language]") : null;
    if (languageButton instanceof HTMLButtonElement) {
      applyLanguage(languageButton.dataset.language);
      return;
    }

    const themeButton = event.target instanceof Element ? event.target.closest("[data-theme-toggle]") : null;
    if (themeButton instanceof HTMLButtonElement) {
      applyTheme(document.documentElement.dataset.theme === "dark" ? "light" : "dark");
    }
  });

  let headerFrame = 0;

  const updateHeader = () => {
    headerFrame = 0;
    const scrollTop = window.scrollY;
    const scrollRange = document.documentElement.scrollHeight - window.innerHeight;
    const progress = scrollRange > 0 ? Math.min(scrollTop / scrollRange, 1) : 0;

    header?.classList.toggle("is-scrolled", scrollTop > 18);
    backToTop?.classList.toggle("is-visible", scrollTop > 720);

    if (scrollProgress instanceof HTMLElement) {
      scrollProgress.style.transform = `scaleX(${progress.toFixed(4)})`;
    }
  };

  const requestHeaderUpdate = () => {
    if (headerFrame !== 0) {
      return;
    }

    headerFrame = window.requestAnimationFrame(updateHeader);
  };

  updateHeader();
  window.addEventListener("scroll", requestHeaderUpdate, { passive: true });

  if (menuToggle instanceof HTMLButtonElement && mobileMenu instanceof HTMLElement) {
    const focusableSelector = "a[href], button:not([disabled])";

    /**
     * @param {boolean} isOpen
     * @param {boolean} [restoreFocus]
     */
    const setMenuState = (isOpen, restoreFocus = false) => {
      menuToggle.setAttribute("aria-expanded", String(isOpen));
      menuToggle.setAttribute("aria-label", getMessage(isOpen ? "a11y.menuClose" : "a11y.menuOpen"));
      mobileMenu.setAttribute("aria-hidden", String(!isOpen));
      mobileMenu.inert = !isOpen;
      mobileMenu.classList.toggle("is-open", isOpen);
      header?.classList.toggle("is-menu-open", isOpen);
      document.body.classList.toggle("menu-open", isOpen);
      if (isOpen) {
        smoothScrollController?.stop();
      } else {
        smoothScrollController?.start();
      }

      if (isOpen) {
        window.requestAnimationFrame(() => {
          mobileMenu.querySelector("a")?.focus();
        });
      } else if (restoreFocus) {
        menuToggle.focus();
      }
    };

    menuToggle.addEventListener("click", () => {
      const shouldOpen = menuToggle.getAttribute("aria-expanded") !== "true";
      setMenuState(shouldOpen);
    });

    mobileMenu.addEventListener("click", (event) => {
      if (event.target instanceof Element && event.target.closest("a")) {
        setMenuState(false);
      }
    });

    menuBackdrop?.addEventListener("click", () => setMenuState(false, true));

    document.addEventListener("keydown", (event) => {
      const isOpen = menuToggle.getAttribute("aria-expanded") === "true";

      if (!isOpen) {
        return;
      }

      if (event.key === "Escape") {
        setMenuState(false, true);
        return;
      }

      if (event.key !== "Tab") {
        return;
      }

      const menuItems = [...mobileMenu.querySelectorAll(focusableSelector)].filter(
        (element) => element instanceof HTMLElement,
      );
      const focusableElements = [menuToggle, ...menuItems];
      const firstElement = focusableElements[0];
      const lastElement = focusableElements.at(-1);

      if (event.shiftKey && document.activeElement === firstElement) {
        event.preventDefault();
        lastElement?.focus();
      } else if (!event.shiftKey && document.activeElement === lastElement) {
        event.preventDefault();
        firstElement.focus();
      }
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth > 920 && menuToggle.getAttribute("aria-expanded") === "true") {
        setMenuState(false);
      }
    });
  }

  const sectionLinks = [...document.querySelectorAll('a[href^="#"]')].filter((link) => {
    const target = link.getAttribute("href");
    return target && target !== "#top" && document.querySelector(target);
  });
  const observedSections = [
    ...new Set(
      sectionLinks
        .map((link) => document.querySelector(link.getAttribute("href")))
        .filter((section) => section instanceof HTMLElement),
    ),
  ];

  if ("IntersectionObserver" in window) {
    const activeSectionObserver = new IntersectionObserver(
      (entries) => {
        const activeEntry = entries.find((entry) => entry.isIntersecting);

        if (!activeEntry) {
          return;
        }

        const activeHash = `#${activeEntry.target.id}`;
        sectionLinks.forEach((link) => {
          const isActive = link.getAttribute("href") === activeHash;
          link.classList.toggle("is-active", isActive);

          if (isActive) {
            link.setAttribute("aria-current", "location");
          } else {
            link.removeAttribute("aria-current");
          }
        });
      },
      { rootMargin: "-28% 0px -62%", threshold: 0 },
    );

    observedSections.forEach((section) => activeSectionObserver.observe(section));
  }

  const revealElements = [...document.querySelectorAll(".reveal")];

  if (!("IntersectionObserver" in window)) {
    revealElements.forEach((element) => element.classList.add("is-visible"));
  } else {
    const revealObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) {
            return;
          }

          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        });
      },
      {
        rootMargin: "0px 0px -9%",
        threshold: 0.08,
      },
    );

    revealElements.forEach((element) => revealObserver.observe(element));
  }

  const loopingElements = [
    ...document.querySelectorAll("[data-looping-section]"),
    ...document.querySelectorAll(".terminal-preview"),
  ];

  if ("IntersectionObserver" in window) {
    const loopingObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          entry.target.classList.toggle("is-in-view", entry.isIntersecting);
        });
      },
      { rootMargin: "80px 0px", threshold: 0.01 },
    );

    loopingElements.forEach((element) => loopingObserver.observe(element));
  }

  const heroVisual = document.querySelector("[data-hero-visual]");
  const appWindow = document.querySelector("[data-app-window]");

  if (
    heroVisual instanceof HTMLElement &&
    appWindow instanceof HTMLElement &&
    finePointerQuery.matches
  ) {
    let pointerFrame = 0;
    let pointerX = 0;
    let pointerY = 0;
    let resetTimer = 0;

    const renderParallax = () => {
      pointerFrame = 0;
      const bounds = heroVisual.getBoundingClientRect();
      const normalizedX = (pointerX - bounds.left) / bounds.width - 0.5;
      const normalizedY = (pointerY - bounds.top) / bounds.height - 0.5;
      const rotateX = 2 - normalizedY * 5;
      const rotateY = -4 + normalizedX * 7;

      appWindow.style.transform = `rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) translate3d(${(
        normalizedX * 4
      ).toFixed(2)}px, ${(normalizedY * 4).toFixed(2)}px, 0)`;
    };

    heroVisual.addEventListener("pointerenter", () => {
      window.clearTimeout(resetTimer);
      appWindow.classList.remove("is-resetting");
      appWindow.classList.add("is-animating");
    });

    heroVisual.addEventListener("pointermove", (event) => {
      pointerX = event.clientX;
      pointerY = event.clientY;

      if (pointerFrame === 0) {
        pointerFrame = window.requestAnimationFrame(renderParallax);
      }
    });

    heroVisual.addEventListener("pointerleave", () => {
      if (pointerFrame !== 0) {
        window.cancelAnimationFrame(pointerFrame);
        pointerFrame = 0;
      }

      appWindow.classList.add("is-resetting");
      window.requestAnimationFrame(() => appWindow.style.removeProperty("transform"));

      resetTimer = window.setTimeout(() => {
        appWindow.classList.remove("is-resetting", "is-animating");
      }, 560);
    });
  }

  if (finePointerQuery.matches) {
    document.querySelectorAll(".bento-card").forEach((card) => {
      if (!(card instanceof HTMLElement)) {
        return;
      }

      const spotlight = document.createElement("span");
      spotlight.className = "card-spotlight";
      spotlight.setAttribute("aria-hidden", "true");
      card.append(spotlight);

      let spotlightFrame = 0;
      let pointerX = 0;
      let pointerY = 0;

      const renderSpotlight = () => {
        spotlightFrame = 0;
        const bounds = card.getBoundingClientRect();
        spotlight.style.transform = `translate3d(${(pointerX - bounds.left).toFixed(1)}px, ${(
          pointerY - bounds.top
        ).toFixed(1)}px, 0)`;
      };

      card.addEventListener("pointerenter", (event) => {
        pointerX = event.clientX;
        pointerY = event.clientY;
        card.classList.add("is-spotlight");
        renderSpotlight();
      });

      card.addEventListener("pointermove", (event) => {
        pointerX = event.clientX;
        pointerY = event.clientY;

        if (spotlightFrame === 0) {
          spotlightFrame = window.requestAnimationFrame(renderSpotlight);
        }
      });

      card.addEventListener("pointerleave", () => {
        if (spotlightFrame !== 0) {
          window.cancelAnimationFrame(spotlightFrame);
          spotlightFrame = 0;
        }

        card.classList.remove("is-spotlight");
      });
    });
  }

  const stackBuilder = document.querySelector("[data-stack-builder]");

  if (stackBuilder instanceof HTMLElement) {
    stackBuilder.addEventListener("click", (event) => {
      const selectedButton =
        event.target instanceof Element ? event.target.closest("button[data-stack-value]") : null;

      if (!(selectedButton instanceof HTMLButtonElement)) {
        return;
      }

      const group = selectedButton.closest("[data-stack-group]");
      const groupName = group?.getAttribute("data-stack-group");
      const value = selectedButton.getAttribute("data-stack-value");

      if (!group || !groupName || !value) {
        return;
      }

      group.querySelectorAll("button[data-stack-value]").forEach((button) => {
        button.setAttribute("aria-pressed", String(button === selectedButton));
      });

      const result = stackBuilder.querySelector(`[data-result-key="${groupName}"]`);

      if (!(result instanceof HTMLElement) || result.textContent === value) {
        return;
      }

      result.textContent = value;

      if (typeof result.animate === "function") {
        result.animate(
          [
            { opacity: 0, transform: "translate3d(0, 5px, 0)" },
            { opacity: 1, transform: "translate3d(0, 0, 0)" },
          ],
          { duration: 190, easing: "cubic-bezier(0.22, 1, 0.36, 1)" },
        );
      }
    });
  }

  const faqItems = [...document.querySelectorAll(".faq-list details")];

  faqItems.forEach((item) => {
    item.addEventListener("toggle", () => {
      if (!item.open) {
        return;
      }

      faqItems.forEach((otherItem) => {
        if (otherItem !== item) {
          otherItem.open = false;
        }
      });
    });
  });
})();
