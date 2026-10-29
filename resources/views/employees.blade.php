<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Employees · Stockwise</title>
    <link href="assets/style.css" rel="stylesheet" />
    <script>
        (function() {
            const q = new URLSearchParams(location.search);
            if (q.get('embed') === '1') {
                document.documentElement.classList.add('embed-mode');
                const r = q.get('role');
                if (r === 'Admin' || r === 'Agent') {
                    sessionStorage.setItem('stockwiseRole', r);
                    if (!sessionStorage.getItem('stockwiseName')) sessionStorage.setItem('stockwiseName', r ===
                        'Admin' ? 'System Administrator' : 'Inventory Agent');
                }
            }
        })();
    </script>
    <style>
        html.embed-mode body {
            margin: 0 !important
        }

        html.embed-mode .sidebar {
            display: none !important
        }

        html.embed-mode .main {
            margin-left: 0 !important;
            min-width: 0 !important
        }

        html.embed-mode .layout {
            min-height: 100vh !important
        }

        html.embed-mode .content {
            max-width: none !important
        }

        html.embed-mode .topbar {
            position: sticky;
            top: 0
        }
    </style>
</head>

<body data-agent-edit="yes" data-page="employees">
    <div class="layout">
        <aside class="sidebar"><a class="brand" href="dashboard.html"><span
                    class="brand-mark">S</span><span>stockwise<small>ASSET MANAGEMENT</small></span></a>
            <nav>
                <div class="nav-group">
                    <div class="nav-caption">Overview</div>
                    <div class="nav-list"><a class="admin-dashboard-only nav-link" data-nav="dashboard"
                            href="dashboard.html"><span class="nav-icon">▦</span>Admin Dashboard</a><a
                            class="agent-dashboard-only nav-link" data-nav="user-dashboard"
                            href="user-dashboard.html"><span class="nav-icon">⌂</span>Agent Dashboard</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Inventory</div>
                    <div class="nav-list"><a class="nav-link" data-nav="assets" href="assets.html"><span
                                class="nav-icon">▣</span>Assets &amp; Hardware</a><a class="nav-link"
                            data-nav="bulk-asset-import" href="bulk-asset-import.html"><span
                                class="nav-icon">⇧</span>Bulk Asset Import</a><a class="nav-link active"
                            data-nav="employees" href="employees.html"><span class="nav-icon">♙</span>Employees</a><a
                            class="nav-link" data-nav="checkin-checkout" href="checkin-checkout.html"><span
                                class="nav-icon">⇄</span>Check-in / Check-out</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Software</div>
                    <div class="nav-list"><a class="nav-link" data-nav="software-management"
                            href="software-management.html#licenses"><span class="nav-icon">▤</span>Software &amp;
                            Warranty</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Operations</div>
                    <div class="nav-list"><a class="nav-link" data-nav="service-desk" href="service-desk.html"><span
                                class="nav-icon">◉</span>Service Desk</a><a class="nav-link" data-nav="asset-transfer"
                            href="asset-transfer.html"><span class="nav-icon">⇆</span>Asset Transfer</a><a
                            class="nav-link" data-nav="acknowledgement" href="acknowledgement.html"><span
                                class="nav-icon">✓</span>Acknowledgement</a><a class="nav-link"
                            data-nav="asset-disposal" href="asset-disposal.html"><span class="nav-icon">⌫</span>Asset
                            Disposal</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Maintenance</div>
                    <div class="nav-list"><a class="nav-link" data-nav="maintenance-center"
                            href="maintenance-center.html#planner"><span class="nav-icon">↻</span>Maintenance Center</a>
                    </div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Insights</div>
                    <div class="nav-list"><a class="nav-link" data-nav="reports" href="reports.html"><span
                                class="nav-icon">▥</span>Reports &amp; Analytics</a><a class="nav-link"
                            data-nav="notifications" href="notifications.html"><span
                                class="nav-icon">♢</span>Notifications</a><a class="nav-link" data-nav="audit-logs"
                            href="audit-logs.html"><span class="nav-icon">☷</span>Audit Logs</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Administration</div>
                    <div class="nav-list"><a class="nav-link admin-only" data-nav="user-management"
                            href="user-management.html"><span class="nav-icon">♙</span>User Management</a><a
                            class="nav-link admin-only" data-nav="role-management" href="role-management.html"><span
                                class="nav-icon">⚿</span>Role Management</a></div>
                </div>
            </nav>
            <div class="side-bottom">Inventory workspace<br />HTML + CSS · Inline JavaScript</div>
        </aside>
        <main class="main">
            <header class="topbar">
                <div class="crumb">Workspace / Employees</div>
                <div class="topbar-right">
                    <div class="search-wrap"><input aria-label="Search this table" id="global-search"
                            placeholder="Search records…" type="search" /></div>
                    <div class="user-chip">
                        <div class="avatar" id="user-avatar">A</div>
                        <div><strong id="user-name">Admin</strong><small id="user-role">Administrator</small></div>
                    </div><button class="btn" id="logout">Log out</button>
                </div>
            </header>
            <section class="content">
                <div class="page-head">
                    <div>
                        <div class="eyebrow">People workspace</div>
                        <h1>Employees</h1>
                        <p>Manage employee records and track their assigned assets.</p>
                    </div>
                    <div class="button-row"><button class="btn" id="export-csv" type="button">⇩ Export
                            CSV</button></div>
                </div>
                <div class="notice"><strong>Employee Asset Tracking</strong><br />Select <b>Asset List</b> to see
                    current assignments or <b>Asset History</b> to view check-out / check-in periods.</div>
                <details class="panel form-panel" id="add-panel">
                    <summary>Add New Employee</summary>
                    <div class="form-body">
                        <form id="recordForm"><input name="_index" type="hidden" value="-1" />
                            <div class="form-grid">
                                <div class="field"><label for="field_0">Staff Code</label><input data-field=""
                                        data-label="Staff Code" id="field_0" name="field_0"
                                        placeholder="GP-EMP-2026-004" required="" type="text" /></div>
                                <div class="field"><label for="field_1">Full Name</label><input data-field=""
                                        data-label="Full Name" id="field_1" name="field_1" placeholder="Full name"
                                        required="" type="text" /></div>
                                <div class="field"><label for="field_2">Department</label><input data-field=""
                                        data-label="Department" id="field_2" name="field_2"
                                        placeholder="IT-Software" type="text" /></div>
                                <div class="field"><label for="field_3">Email</label><input data-field=""
                                        data-label="Email" id="field_3" name="field_3"
                                        placeholder="name@example.com" type="email" /></div>
                                <div class="field"><label for="field_4">Active</label><select data-field=""
                                        data-label="Active" id="field_4" name="field_4">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select></div>
                            </div>
                            <div class="form-footer"><button class="btn" type="reset">Clear</button><button
                                    class="btn primary" type="submit">Save Employee</button></div>
                        </form>
                    </div>
                </details>
                <div class="panel">
                    <div class="panel-head">
                        <div>
                            <h2>Employee Records</h2>
                            <p>Use the actions to inspect asset assignments and history.</p>
                        </div><span class="count" id="record-count">3 employees</span>
                    </div>
                    <div class="record-tools">
                        <div class="filter-wrap"><label for="record-filter">Status</label><select id="record-filter">
                                <option value="">All employees</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select></div><span class="count">Saved in this browser</span>
                    </div>
                    <div class="table-wrap">
                        <table id="records">
                            <thead>
                                <tr>
                                    <th>Staff Code</th>
                                    <th>Full Name</th>
                                    <th>Department</th>
                                    <th>Email</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <dialog class="modal" id="employee-modal">
        <div class="modal-head">
            <div><span class="eyebrow">Employee records</span>
                <h2 id="employee-modal-title">Employee Assets</h2>
            </div><button class="icon-close" data-close="employee-modal" type="button">×</button>
        </div>
        <div class="modal-body" id="employee-modal-content"></div>
        <div class="modal-footer"><button class="btn" data-close="employee-modal" type="button">Close</button>
        </div>
    </dialog>
    <script>
        (function() {
            const role = sessionStorage.getItem('stockwiseRole');
            if (!role) {
                location.href = 'login.html';
                return;
            }
            const name = sessionStorage.getItem('stockwiseName') || role;
            document.getElementById('user-name').textContent = name;
            document.getElementById('user-role').textContent = role;
            document.getElementById('user-avatar').textContent = name[0].toUpperCase();
            document.querySelectorAll('.admin-only').forEach(el => el.hidden = role !== 'Admin');
            document.querySelectorAll('.admin-dashboard-only').forEach(el => el.hidden = role !== 'Admin');
            document.querySelectorAll('.agent-dashboard-only').forEach(el => el.hidden = role !== 'Agent');
            document.getElementById('logout').onclick = () => {
                sessionStorage.clear();
                location.href = 'login.html';
            };
            const key = 'stockwise_employees',
                table = document.getElementById('records'),
                tbody = table.tBodies[0],
                form = document.getElementById('recordForm'),
                fields = [...form.querySelectorAll('[data-field]')],
                search = document.getElementById('global-search'),
                filter = document.getElementById('record-filter'),
                panel = document.getElementById('add-panel');
            let rows = JSON.parse(localStorage.getItem(key) || 'null');
            if (!Array.isArray(rows)) rows = [
                ['GP-EMP-2026-001', 'Saw Yan Htet', 'IT-Software', 'sales1@gmail.com', 'Active'],
                ['GP-EMP-2026-002', 'Aung Min', 'IT & Operations', 'aung.min@example.com', 'Active'],
                ['GP-EMP-2026-003', 'Su Su Hlaing', 'Finance', 'susu.hlaing@example.com', 'Active']
            ];
            const esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
            } [c]));

            function render() {
                tbody.replaceChildren();
                rows.forEach((r, i) => {
                    if (search.value && !r.join(' ').toLowerCase().includes(search.value.toLowerCase())) return;
                    if (filter.value && r[4] !== filter.value) return;
                    const tr = tbody.insertRow();
                    tr.dataset.index = i;
                    r.forEach((v, j) => {
                        const td = tr.insertCell();
                        td.innerHTML = j === 4 ? '<span class="status-chip ' + (v === 'Active' ?
                            'status-active' : 'status-inactive') + '">' + esc(v) + '</span>' : esc(
                            v || '—');
                    });
                    const c = tr.insertCell();
                    c.innerHTML =
                        '<button class="mini-btn" data-action="asset-list">Asset List</button> <button class="mini-btn" data-action="asset-history">Asset History</button> <button class="mini-btn" data-action="edit">Edit</button>' +
                        (role === 'Admin' ?
                            ' <button class="mini-btn delete" data-action="delete">Delete</button>' : '');
                });
                localStorage.setItem(key, JSON.stringify(rows));
                document.getElementById('record-count').textContent = rows.length + ' employees';
            }
            form.onsubmit = e => {
                e.preventDefault();
                const vals = fields.map(f => f.value.trim()),
                    i = Number(form.elements._index.value);
                if (i >= 0) rows[i] = vals;
                else rows.unshift(vals);
                form.reset();
                form.elements._index.value = '-1';
                panel.open = false;
                form.querySelector('[type=submit]').textContent = 'Save Employee';
                render();
            };
            form.onreset = () => setTimeout(() => {
                form.elements._index.value = '-1';
                form.querySelector('[type=submit]').textContent = 'Save Employee';
            }, 0);

            function showModal(title, html) {
                document.getElementById('employee-modal-title').textContent = title;
                document.getElementById('employee-modal-content').innerHTML = html;
                document.getElementById('employee-modal').showModal();
            }
            document.addEventListener('click', e => {
                if (e.target.closest('[data-close]')) {
                    const d = document.getElementById(e.target.closest('[data-close]').dataset.close);
                    if (d.open) d.close();
                }
            });
            table.onclick = e => {
                const b = e.target.closest('[data-action]');
                if (!b) return;
                const i = Number(b.closest('tr').dataset.index),
                    r = rows[i];
                if (b.dataset.action === 'delete') {
                    if (role === 'Admin' && confirm('Delete this employee?')) {
                        rows.splice(i, 1);
                        render();
                    }
                    return;
                }
                if (b.dataset.action === 'edit') {
                    form.elements._index.value = i;
                    fields.forEach((f, n) => f.value = r[n] || '');
                    form.querySelector('[type=submit]').textContent = 'Update Employee';
                    panel.open = true;
                    panel.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    return;
                }
                const assets = JSON.parse(localStorage.getItem('stockwise_assets') || '[]'),
                    history = JSON.parse(localStorage.getItem('stockwise_checkin-checkout') || '[]');
                if (b.dataset.action === 'asset-list') {
                    const assigned = assets.filter(a => (a[6] || '').toLowerCase() === String(r[1]).toLowerCase());
                    showModal('Assets assigned to ' + r[1], assigned.length ?
                        '<div class="table-wrap"><table><thead><tr><th>Asset Tag</th><th>Category</th><th>Brand</th><th>Model</th><th>Status</th></tr></thead><tbody>' +
                        assigned.map(a => '<tr><td>' + esc(a[0]) + '</td><td>' + esc(a[1]) + '</td><td>' + esc(
                            a[2]) + '</td><td>' + esc(a[3]) + '</td><td>' + esc(a[5]) + '</td></tr>').join('') +
                        '</tbody></table></div>' : '<p class="empty-state">No assets currently assigned.</p>');
                } else {
                    const logs = history.filter(h => String(h[1]).toLowerCase() === String(r[1]).toLowerCase());
                    showModal('Asset history · ' + r[1], logs.length ?
                        '<div class="table-wrap"><table><thead><tr><th>Asset Tag</th><th>Issued At</th><th>Returned At</th><th>Notes</th></tr></thead><tbody>' +
                        logs.map(h => '<tr><td>' + esc(h[0]) + '</td><td>' + esc(h[2]) + '</td><td>' + esc(h[
                            3] || 'Still checked out') + '</td><td>' + esc(h[4]) + '</td></tr>').join('') +
                        '</tbody></table></div>' :
                        '<p class="empty-state">No check-in / check-out history found.</p>');
                }
            };
            search.oninput = render;
            filter.onchange = render;
            document.getElementById('export-csv').onclick = () => {
                const csv = [
                    ['Staff Code', 'Full Name', 'Department', 'Email', 'Active'].join(','), ...rows.map(r => r
                        .map(v => '"' + String(v ?? '').replace(/"/g, '""') + '"').join(','))
                ].join('\n');
                const a = document.createElement('a');
                a.href = URL.createObjectURL(new Blob([csv], {
                    type: 'text/csv'
                }));
                a.download = 'employees.csv';
                a.click();
                URL.revokeObjectURL(a.href);
            };
            render();
        })();
    </script>
    <script>
        (function() {
            function syncNav() {
                const role = sessionStorage.getItem('stockwiseRole');
                document.querySelectorAll('.admin-dashboard-only').forEach(el => el.hidden = role !== 'Admin');
                document.querySelectorAll('.agent-dashboard-only').forEach(el => el.hidden = role !== 'Agent');
            }
            syncNav();
            if (window.__stockwiseSpaInstalled) return;
            window.__stockwiseSpaInstalled = true;
            async function loadPage(href, push) {
                const target = new URL(href, location.href);
                if (target.pathname === location.pathname && target.hash) {
                    if (push) history.pushState({
                        stockwise: true
                    }, '', target.href);
                    const tab = decodeURIComponent(target.hash.slice(1));
                    const button = document.querySelector('[data-tab="' + CSS.escape(tab) + '"]');
                    if (button) {
                        button.click();
                        return;
                    }
                    return;
                }
                try {
                    const res = await fetch(target.href);
                    if (!res.ok) throw new Error('Page could not be loaded');
                    const doc = new DOMParser().parseFromString(await res.text(), 'text/html');
                    if (!doc.querySelector('.main')) throw new Error('Invalid page');
                    if (push) history.pushState({
                        stockwise: true
                    }, '', target.href);
                    document.title = doc.title;
                    [...document.body.attributes].forEach(a => document.body.removeAttribute(a.name));
                    [...doc.body.attributes].forEach(a => document.body.setAttribute(a.name, a.value));
                    document.body.innerHTML = doc.body.innerHTML;
                    document.querySelectorAll('script').forEach(old => {
                        const n = document.createElement('script');
                        if (old.src) n.src = old.src;
                        else n.textContent = old.textContent;
                        old.replaceWith(n)
                    });
                    syncNav();
                    const hash = target.hash.slice(1);
                    if (hash) {
                        const tab = document.querySelector('[data-tab="' + CSS.escape(hash) + '"]');
                        if (tab) tab.click();
                    }
                    window.scrollTo(0, 0);
                } catch (e) {
                    location.assign(target.href)
                }
            }
            document.addEventListener('click', e => {
                const a = e.target.closest('a[href]');
                if (!a || a.target || e.defaultPrevented || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey)
                    return;
                const u = new URL(a.href, location.href);
                if (u.origin !== location.origin || !u.pathname.toLowerCase().endsWith('.html') || (u
                        .pathname === location.pathname && u.hash === location.hash)) return;
                e.preventDefault();
                loadPage(u.href, true)
            });
            window.addEventListener('popstate', () => loadPage(location.href, false));
        })();
    </script>
    <script>
        (function() {
            if (window === window.top) return;
            document.addEventListener('click', function(e) {
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
                const logout = e.target.closest('#logout');
                if (logout) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    parent.postMessage({
                        type: 'stockwise-logout'
                    }, '*');
                    return;
                }
                const a = e.target.closest('a[href]');
                if (!a || a.target || e.defaultPrevented) return;
                let u;
                try {
                    u = new URL(a.href, location.href)
                } catch (_) {
                    return;
                }
                if (!u.pathname.toLowerCase().endsWith('.html') || u.pathname === location.pathname) return;
                e.preventDefault();
                e.stopImmediatePropagation();
                parent.postMessage({
                    type: 'stockwise-navigate',
                    href: u.href
                }, '*');
            }, true);
        })();
    </script>
</body>

</html>
