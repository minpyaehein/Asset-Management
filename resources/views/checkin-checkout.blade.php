<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Check-in / Check-out · Stockwise</title>
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

<body data-agent-edit="yes" data-page="checkin-checkout">
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
                                class="nav-icon">⇧</span>Bulk Asset Import</a><a class="nav-link" data-nav="employees"
                            href="employees.html"><span class="nav-icon">♙</span>Employees</a><a class="nav-link active"
                            data-nav="checkin-checkout" href="checkin-checkout.html"><span
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
                <div class="crumb">Workspace / Check-in / Check-out</div>
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
                        <div class="eyebrow">Asset allocation</div>
                        <h1>Check-in / Check-out</h1>
                        <p>Issue hardware to an employee and record its return.</p>
                    </div>
                    <div class="button-row"><button class="btn" id="export-csv" type="button">⇩ Export
                            CSV</button></div>
                </div>
                <details class="panel form-panel" id="add-panel">
                    <summary>Allocate / Return Hardware</summary>
                    <div class="form-body">
                        <form id="recordForm"><input name="_index" type="hidden" value="-1" />
                            <div class="form-grid">
                                <div class="field"><label for="co-asset">Asset ID</label><select data-field=""
                                        data-label="Asset Tag" id="co-asset" required="">
                                        <option value="AST-1001">AST-1001 · MacBook Pro</option>
                                        <option value="AST-1002">AST-1002 · ThinkPad</option>
                                        <option value="AST-1003">AST-1003 · Monitor</option>
                                    </select></div>
                                <div class="field"><label for="co-employee">Employee ID</label><select
                                        data-field="" data-label="Employee Name" id="co-employee" required="">
                                        <option value="Aung Min">Aung Min</option>
                                        <option value="Su Su Hlaing">Su Su Hlaing</option>
                                        <option value="Saw Yan Htet">Saw Yan Htet</option>
                                        <option value="Myo Thant">Myo Thant</option>
                                    </select></div>
                                <div class="field field-wide"><label for="co-notes">Notes</label>
                                    <textarea data-field="" data-label="Notes" id="co-notes" placeholder="Condition, reason or return notes"></textarea>
                                </div>
                            </div>
                            <div class="form-footer"><button class="btn primary" data-check-action="out"
                                    type="button">Check Out Asset</button><button class="btn"
                                    data-check-action="in" type="button">Check In Asset</button><button
                                    class="btn" type="reset">Clear</button></div>
                        </form>
                    </div>
                </details>
                <div class="panel">
                    <div class="panel-head">
                        <div>
                            <h2>Allocation History</h2>
                            <p>Open records remain marked as Checked Out until returned.</p>
                        </div><span class="count" id="record-count">2 records</span>
                    </div>
                    <div class="record-tools">
                        <div class="filter-wrap"><label for="record-filter">Filter</label><select id="record-filter">
                                <option value="">All records</option>
                                <option value="out">Checked Out</option>
                                <option value="in">Returned</option>
                            </select></div><span class="count">Saved in this browser</span>
                    </div>
                    <div class="table-wrap">
                        <table id="records">
                            <thead>
                                <tr>
                                    <th>Asset Tag</th>
                                    <th>Employee Name</th>
                                    <th>Issued At</th>
                                    <th>Returned At</th>
                                    <th>Notes</th>
                                    <th>Status</th>
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
            const key = 'stockwise_checkin-checkout',
                form = document.getElementById('recordForm'),
                table = document.getElementById('records'),
                tbody = table.tBodies[0],
                search = document.getElementById('global-search'),
                filter = document.getElementById('record-filter'),
                panel = document.getElementById('add-panel');
            let rows = JSON.parse(localStorage.getItem(key) || 'null');
            if (!Array.isArray(rows)) rows = [
                ['AST-1001', 'Aung Min', '2026-10-14 09:00', '2026-10-28 16:30', 'New joiner equipment'],
                ['AST-1003', 'Su Su Hlaing', '2026-10-09 10:15', '', 'Monitor issued']
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
                    const isOut = !r[3];
                    if (search.value && !r.join(' ').toLowerCase().includes(search.value.toLowerCase())) return;
                    if (filter.value === 'out' && !isOut || filter.value === 'in' && isOut) return;
                    const tr = tbody.insertRow();
                    tr.dataset.index = i;
                    r.slice(0, 5).forEach(v => tr.insertCell().textContent = v || '—');
                    tr.insertCell().innerHTML = '<span class="status-chip ' + (isOut ? 'status-assigned' :
                        'status-active') + '">' + (isOut ? 'Checked Out' : 'Returned') + '</span>';
                    const c = tr.insertCell();
                    c.innerHTML = (isOut ? '<button class="mini-btn" data-action="in">Check In</button> ' :
                        '') + (role === 'Admin' ?
                            '<button class="mini-btn delete" data-action="delete">Delete</button>' : '');
                });
                localStorage.setItem(key, JSON.stringify(rows));
                document.getElementById('record-count').textContent = rows.length + ' records';
            }

            function changeAsset(tag, employee, status) {
                let arr = JSON.parse(localStorage.getItem('stockwise_assets') || 'null');
                if (!Array.isArray(arr)) arr = [
                    ['AST-1001', 'Laptop', 'Apple', 'MacBook Pro 14-inch', 'SN-1001', 'Assigned', 'Aung Min',
                        '2026-10-14', '2100', '2027-10-14', 'Yangon · Floor 3', 'Primary laptop'
                    ],
                    ['AST-1002', 'Laptop', 'Lenovo', 'ThinkPad X1 Carbon', 'SN-1002', 'Available', '', '2026-09-30',
                        '1650', '2027-09-30', 'Yangon · IT Store', 'Spare laptop'
                    ],
                    ['AST-1003', 'Monitor', 'Dell', 'UltraSharp 27', 'SN-1003', 'Assigned', 'Su Su Hlaing',
                        '2026-09-15', '480', '2027-09-15', 'Yangon · Floor 2', 'External display'
                    ]
                ];
                const a = arr.find(r => r[0] === tag);
                if (a) {
                    a[5] = status;
                    a[6] = status === 'Assigned' ? employee : '';
                    localStorage.setItem('stockwise_assets', JSON.stringify(arr));
                }
            }

            function stamp() {
                return new Date().toLocaleString();
            }

            function doAction(kind) {
                const tag = document.getElementById('co-asset').value,
                    emp = document.getElementById('co-employee').value,
                    notes = document.getElementById('co-notes').value.trim();
                if (kind === 'out') {
                    const open = rows.find(r => r[0] === tag && !r[3]);
                    if (open) {
                        alert('This asset is already checked out. Check it in first.');
                        return;
                    }
                    rows.unshift([tag, emp, stamp(), ' ', notes]);
                    rows[0][3] = '';
                    changeAsset(tag, emp, 'Assigned');
                } else {
                    const target = rows.find(r => r[0] === tag && !r[3]);
                    if (!target) {
                        alert('No open check-out record found for this asset.');
                        return;
                    }
                    target[3] = stamp();
                    if (notes) target[4] = target[4] ? (target[4] + ' | Return: ' + notes) : notes;
                    changeAsset(tag, '', 'Available');
                }
                form.reset();
                panel.open = false;
                render();
            }
            document.querySelectorAll('[data-check-action]').forEach(b => b.onclick = () => doAction(b.dataset
                .checkAction));
            table.onclick = e => {
                const b = e.target.closest('[data-action]');
                if (!b) return;
                const i = Number(b.closest('tr').dataset.index);
                if (b.dataset.action === 'in') {
                    document.getElementById('co-asset').value = rows[i][0];
                    document.getElementById('co-employee').value = rows[i][1];
                    doAction('in');
                } else if (b.dataset.action === 'delete' && role === 'Admin' && confirm('Delete this record?')) {
                    rows.splice(i, 1);
                    render();
                }
            };
            search.oninput = render;
            filter.onchange = render;
            document.getElementById('export-csv').onclick = () => {
                const csv = [
                    ['Asset Tag', 'Employee Name', 'Issued At', 'Returned At', 'Notes', 'Status'].join(','), ...
                    rows.map(r => [...r, r[3] ? 'Returned' : 'Checked Out'].map(v => '"' + String(v ?? '')
                        .replace(/"/g, '""') + '"').join(','))
                ].join('\n');
                const a = document.createElement('a');
                a.href = URL.createObjectURL(new Blob([csv], {
                    type: 'text/csv'
                }));
                a.download = 'checkin-checkout.csv';
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
