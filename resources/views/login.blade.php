<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>Login · Stockwise</title>
        <link href="assets/style.css" rel="stylesheet" />
    </head>
    <body>
        <main class="login-page">
            <section class="login-art">
                <a class="brand" href="login.html"
                    ><span class="brand-mark">S</span
                    ><span>stockwise<small>ASSET MANAGEMENT</small></span></a
                >
                <div>
                    <div class="eyebrow" style="color: #adc1ff">
                        INVENTORY CONTROL, SIMPLIFIED
                    </div>
                    <h1>Every asset.<br />One clear view.</h1>
                    <p>
                        Manage company equipment, software licenses, employee
                        assignments and maintenance records in one practical
                        workspace.
                    </p>
                </div>
                <small style="color: #9db0d1"
                    >Stockwise Inventory Management · Demo edition</small
                >
            </section>
            <section class="login-card-wrap">
                <form class="login-card" id="loginForm">
                    <div class="eyebrow">Welcome back</div>
                    <h2>Sign in to Stockwise</h2>
                    <p>Use one of the two demo roles to continue.</p>
                    <div class="field">
                        <label for="username">Username</label
                        ><input
                            autocomplete="username"
                            id="username"
                            placeholder="Enter username"
                            required=""
                        />
                    </div>
                    <div class="field">
                        <label for="password">Password</label
                        ><input
                            autocomplete="current-password"
                            id="password"
                            placeholder="Enter password"
                            required=""
                            type="password"
                        />
                    </div>
                    <button
                        class="btn primary"
                        style="width: 100%; padding: 12px"
                        type="submit"
                    >
                        Sign In →
                    </button>
                    <div
                        class="footer-note"
                        id="login-error"
                        style="color: #b83333"
                    ></div>
                    <div class="demo-account">
                        <strong>Demo accounts</strong><br />Admin:
                        <strong>admin</strong> / <strong>admin123</strong
                        ><br />Agent: <strong>agent</strong> /
                        <strong>agent123</strong>
                    </div>
                    <div class="footer-note">
                        Prototype note: browser-based demo login only. Use
                        server-side authentication before production.
                    </div>
                </form>
            </section>
        </main>
        <script>
            document.getElementById("loginForm").onsubmit = function (e) {
                e.preventDefault();
                const u = document.getElementById("username").value.trim(),
                    p = document.getElementById("password").value;
                let role = "";
                if (u === "admin" && p === "admin123") role = "Admin";
                if (u === "agent" && p === "agent123") role = "Agent";
                if (!role) {
                    document.getElementById("login-error").textContent =
                        "Username or password is incorrect.";
                    return;
                }
                sessionStorage.setItem("stockwiseRole", role);
                sessionStorage.setItem(
                    "stockwiseName",
                    role === "Admin"
                        ? "System Administrator"
                        : "Inventory Agent",
                );
                location.href =
                    "app.html?view=" +
                    (role === "Admin"
                        ? "dashboard.html"
                        : "user-dashboard.html");
            };
        </script>
        <script>
            (function () {
                function syncDashboardLinks() {
                    const r = sessionStorage.getItem("stockwiseRole");
                    document
                        .querySelectorAll(".admin-dashboard-only")
                        .forEach((el) => (el.hidden = r !== "Admin"));
                    document
                        .querySelectorAll(".agent-dashboard-only")
                        .forEach((el) => (el.hidden = r !== "Agent"));
                }
                syncDashboardLinks();
                if (window.__stockwiseSpaInstalled) return;
                window.__stockwiseSpaInstalled = true;
                async function loadPage(href, push) {
                    const target = new URL(href, location.href);
                    try {
                        const res = await fetch(target.href);
                        if (!res.ok) throw 0;
                        const doc = new DOMParser().parseFromString(
                            await res.text(),
                            "text/html",
                        );
                        if (!doc.querySelector(".main")) throw 0;
                        if (push)
                            history.pushState(
                                { stockwise: true },
                                "",
                                target.href,
                            );
                        document.title = doc.title;
                        [...document.body.attributes].forEach((a) =>
                            document.body.removeAttribute(a.name),
                        );
                        [...doc.body.attributes].forEach((a) =>
                            document.body.setAttribute(a.name, a.value),
                        );
                        document.body.innerHTML = doc.body.innerHTML;
                        const scripts = [
                            ...document.querySelectorAll("script"),
                        ];
                        scripts.forEach((old) => {
                            const n = document.createElement("script");
                            if (old.src) n.src = old.src;
                            else n.textContent = old.textContent;
                            old.replaceWith(n);
                        });
                        syncDashboardLinks();
                        window.scrollTo(0, 0);
                    } catch (e) {
                        location.assign(target.href);
                    }
                }
                document.addEventListener("click", (e) => {
                    const a = e.target.closest("a[href]");
                    if (!a || a.target || e.defaultPrevented) return;
                    const u = new URL(a.href, location.href);
                    if (
                        u.origin !== location.origin ||
                        !u.pathname.toLowerCase().endsWith(".html")
                    )
                        return;
                    if (u.pathname === location.pathname) {
                        e.preventDefault();
                        if (u.hash && u.hash !== location.hash) {
                            history.pushState({ stockwise: true }, "", u.href);
                            const tab = document.querySelector(
                                '[data-tab=\"' + u.hash.slice(1) + '\"]',
                            );
                            if (tab) tab.click();
                        }
                        return;
                    }
                    e.preventDefault();
                    loadPage(u.href, true);
                });
                window.addEventListener("popstate", () =>
                    loadPage(location.href, false),
                );
            })();
        </script>
    </body>
</html>
