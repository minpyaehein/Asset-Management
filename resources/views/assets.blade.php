<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Assets &amp; Hardware · Stockwise</title>
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

<body data-agent-edit="yes" data-page="assets">
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
                    <div class="nav-list"><a class="nav-link active" data-nav="assets" href="assets.html"><span
                                class="nav-icon">▣</span>Assets &amp; Hardware</a><a class="nav-link"
                            data-nav="bulk-asset-import" href="bulk-asset-import.html"><span
                                class="nav-icon">⇧</span>Bulk Asset Import</a><a class="nav-link" data-nav="employees"
                            href="employees.html"><span class="nav-icon">♙</span>Employees</a><a class="nav-link"
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
                <div class="crumb">Workspace / Assets &amp; Hardware</div>
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
                        <div class="eyebrow">Inventory workspace</div>
                        <h1>Assets &amp; Hardware</h1>
                        <p>Manage asset details, assignment, warranty and lifecycle status.</p>
                    </div>
                    <div class="button-row"><button class="btn" id="export-csv" type="button">⇩ Export
                            CSV</button><button class="btn" onclick="window.print()" type="button">Print</button>
                    </div>
                </div>
                <details class="panel form-panel" id="add-panel">
                    <summary>Add New Asset</summary>
                    <div class="form-body">
                        <form id="recordForm"><input name="_index" type="hidden" value="-1" />
                            <div class="form-grid">
                                <div class="field"><label for="field_0">Asset Tag</label><input data-col="0"
                                        data-field="" data-label="Asset Tag" id="field_0" name="field_0"
                                        placeholder="AST-1007" required="" type="text" /></div>
                                <div class="field"><label for="field_1">Category</label><select data-col="1"
                                        data-field="" data-label="Category" id="field_1" name="field_1"
                                        required="">
                                        <option value="Laptop">Laptop</option>
                                        <option value="Desktop">Desktop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Network Device">Network Device</option>
                                        <option value="Accessory">Accessory</option>
                                        <option value="Other">Other</option>
                                    </select></div>
                                <div class="field"><label for="field_2">Brand</label><input data-col="2"
                                        data-field="" data-label="Brand" id="field_2" name="field_2"
                                        placeholder="Dell / Apple / Lenovo" type="text" /></div>
                                <div class="field"><label for="field_3">Model</label><input data-col="3"
                                        data-field="" data-label="Model" id="field_3" name="field_3"
                                        placeholder="Device model" type="text" /></div>
                                <div class="field"><label for="field_4">Serial Number</label><input data-col="4"
                                        data-field="" data-label="Serial Number" id="field_4" name="field_4"
                                        placeholder="Serial number" type="text" /></div>
                                <div class="field"><label for="field_5">Purchase Date</label><input data-col="7"
                                        data-field="" data-label="Purchase Date" id="field_5" name="field_5"
                                        placeholder="" type="date" /></div>
                                <div class="field"><label for="field_6">Purchase Cost</label><input data-col="8"
                                        data-field="" data-label="Purchase Cost" id="field_6" name="field_6"
                                        placeholder="0.00" type="number" /></div>
                                <div class="field"><label for="field_7">Warranty End</label><input data-col="9"
                                        data-field="" data-label="Warranty End" id="field_7" name="field_7"
                                        placeholder="" type="date" /></div>
                                <div class="field"><label for="field_8">Location</label><input data-col="10"
                                        data-field="" data-label="Location" id="field_8" name="field_8"
                                        placeholder="Office / Floor" type="text" /></div>
                                <div class="field"><label for="field_9">Notes</label>
                                    <textarea data-col="11" data-field="" data-label="Notes" id="field_9" name="field_9" placeholder="Add notes"></textarea>
                                </div>
                            </div>
                            <div class="form-footer"><button class="btn" type="reset">Clear</button><button
                                    class="btn primary" type="submit">Save Asset</button></div>
                        </form>
                    </div>
                </details>
                <div class="panel">
                    <div class="panel-head">
                        <div>
                            <h2>Asset Records</h2>
                            <p>Open Details for a centered overview or Set Status to update the lifecycle state.</p>
                        </div><span class="count" id="record-count">3 records</span>
                    </div>
                    <div class="record-tools">
                        <div class="filter-wrap"><label for="record-filter">Status</label><select id="record-filter">
                                <option value="">All statuses</option>
                                <option>Available</option>
                                <option>Assigned</option>
                                <option>Maintenance</option>
                                <option>Retired</option>
                                <option>Active</option>
                                <option value="Inactive">Non-active</option>
                            </select></div><span class="count">Changes are saved in this browser</span>
                    </div>
                    <div class="table-wrap">
                        <table id="records">
                            <thead>
                                <tr>
                                    <th>Asset Tag</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Serial Number</th>
                                    <th>Status</th>
                                    <th>Assigned To</th>
                                    <th>Warranty End</th>
                                    <th>Location</th>
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
    <dialog class="modal" id="asset-detail-modal">
        <div class="modal-head">
            <div><span class="eyebrow">Asset profile</span>
                <h2 id="asset-detail-title">Asset Details</h2>
            </div><button aria-label="Close" class="icon-close" data-close="asset-detail-modal"
                type="button">×</button>
        </div>
        <div class="modal-body">
            <div class="detail-grid" id="asset-detail-grid"></div>
        </div>
        <div class="modal-footer"><button class="btn" data-close="asset-detail-modal"
                type="button">Close</button></div>
    </dialog>
    <dialog class="modal status-modal" id="asset-status-modal">
        <div class="modal-head">
            <div><span class="eyebrow">Lifecycle control</span>
                <h2>Set Asset Status</h2>
                <p>Choose the new state for this asset.</p>
            </div><button aria-label="Close" class="icon-close" data-close="asset-status-modal"
                type="button">×</button>
        </div>
        <form id="asset-status-form"><input id="status-row-index" type="hidden" />
            <div class="modal-body">
                <div class="status-options"><label class="status-choice"><input name="asset-status" type="radio"
                            value="Active" required /><span>●</span><b>Active</b><small>In active
                            service</small></label><label class="status-choice"><input name="asset-status"
                            type="radio" value="Available" required /><span>●</span><b>Available</b><small>Ready to
                            allocate</small></label><label class="status-choice"><input name="asset-status"
                            type="radio" value="Assigned" required /><span>●</span><b>Assigned</b><small>Issued to
                            an employee</small></label><label class="status-choice"><input name="asset-status"
                            type="radio" value="Maintenance" required /><span>●</span><b>Maintenance</b><small>Under
                            repair or review</small></label><label class="status-choice"><input name="asset-status"
                            type="radio" value="Inactive" required /><span>●</span><b>Non-active</b><small>Not in
                            active service</small></label><label class="status-choice"><input name="asset-status"
                            type="radio" value="Retired" required /><span>●</span><b>Retired</b><small>End of
                            lifecycle</small></label></div>
            </div>
            <div class="modal-footer"><button class="btn" data-close="asset-status-modal"
                    type="button">Cancel</button><button class="btn primary" type="submit">Save Status</button>
            </div>
        </form>
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
            const key = 'stockwise_assets',
                form = document.getElementById('recordForm'),
                table = document.getElementById('records'),
                tbody = table.tBodies[0],
                search = document.getElementById('global-search'),
                filter = document.getElementById('record-filter'),
                panel = document.getElementById('add-panel');
            const fields = [...form.querySelectorAll('[data-field]')],
                labels = ['Asset Tag', 'Category', 'Brand', 'Model', 'Serial Number', 'Status', 'Assigned To',
                    'Purchase Date', 'Purchase Cost', 'Warranty End', 'Location', 'Notes'
                ];
            let rows = JSON.parse(localStorage.getItem(key) || 'null');
            if (!Array.isArray(rows)) rows = [
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
            rows = rows.map(r => {
                if (Array.isArray(r) && /^non[ -]?active$/i.test(String(r[5] || ''))) r[5] = 'Inactive';
                return r;
            });
            const esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
            } [c]));
            const badge = s => '<span class="status-chip status-' + String(s || 'Available').toLowerCase().replace(
                /[^a-z]+/g, '-') + '">' + esc(s || 'Available') + '</span>';

            function render() {
                tbody.replaceChildren();
                rows.forEach((r, i) => {
                    if (search.value && !r.join(' ').toLowerCase().includes(search.value.toLowerCase())) return;
                    if (filter.value && r[5] !== filter.value) return;
                    const tr = tbody.insertRow();
                    tr.dataset.index = i;
                    [0, 1, 2, 3, 4].forEach(n => tr.insertCell().textContent = r[n] || '—');
                    tr.insertCell().innerHTML = badge(r[5]);
                    tr.insertCell().textContent = r[6] || '—';
                    tr.insertCell().textContent = r[9] || '—';
                    tr.insertCell().textContent = r[10] || '—';
                    const a = tr.insertCell();
                    a.innerHTML =
                        '<button class="mini-btn" data-action="details">Details</button> <button class="mini-btn" data-action="edit">Edit</button> <button class="mini-btn" data-action="status">Set Status</button>' +
                        (role === 'Admin' ?
                            ' <button class="mini-btn delete" data-action="delete">Delete</button>' : '');
                });
                localStorage.setItem(key, JSON.stringify(rows));
                document.getElementById('record-count').textContent = rows.length + ' assets';
            }

            function closeDialog(id) {
                const d = document.getElementById(id);
                if (d.open) d.close();
            }
            document.addEventListener('click', e => {
                const c = e.target.closest('[data-close]');
                if (c) closeDialog(c.dataset.close);
            });
            form.onsubmit = e => {
                e.preventDefault();
                const idx = Number(form.elements._index.value),
                    values = Array(12).fill('');
                fields.forEach(f => values[Number(f.dataset.col)] = f.value.trim());
                if (idx >= 0) {
                    const old = rows[idx];
                    values[5] = old[5];
                    values[6] = old[6];
                    rows[idx] = values;
                } else {
                    values[5] = 'Available';
                    values[6] = '';
                    rows.unshift(values);
                }
                form.reset();
                form.elements._index.value = '-1';
                panel.open = false;
                form.querySelector('[type=submit]').textContent = 'Save Asset';
                render();
            };
            form.onreset = () => {
                setTimeout(() => {
                    form.elements._index.value = '-1';
                    form.querySelector('[type=submit]').textContent = 'Save Asset';
                }, 0)
            };
            table.onclick = e => {
                const b = e.target.closest('[data-action]');
                if (!b) return;
                const tr = b.closest('tr'),
                    i = Number(tr.dataset.index),
                    r = rows[i];
                if (b.dataset.action === 'delete') {
                    if (role === 'Admin' && confirm('Delete this asset?')) {
                        rows.splice(i, 1);
                        render();
                    }
                    return;
                }
                if (b.dataset.action === 'details') {
                    document.getElementById('asset-detail-title').textContent = (r[0] || 'Asset') + ' · Details';
                    document.getElementById('asset-detail-grid').innerHTML = labels.map((l, n) =>
                        '<div class="detail-item"><span>' + esc(l) + '</span><strong>' + (n === 5 ? badge(r[
                            n]) : esc(r[n] || '—')) + '</strong></div>').join('');
                    document.getElementById('asset-detail-modal').showModal();
                    return;
                }
                if (b.dataset.action === 'status') {
                    document.getElementById('status-row-index').value = i;
                    document.querySelectorAll('input[name="asset-status"]').forEach(x => x.checked = false);
                    let current = String(r[5] || 'Available');
                    if (/^non[ -]?active$/i.test(current)) current = 'Inactive';
                    let radio = [...document.querySelectorAll('input[name="asset-status"]')].find(x => x.value
                        .toLowerCase() === current.toLowerCase());
                    if (!radio) radio = document.querySelector('input[name="asset-status"][value="Available"]');
                    if (radio) radio.checked = true;
                    document.getElementById('asset-status-modal').showModal();
                    return;
                }
                if (b.dataset.action === 'edit') {
                    form.elements._index.value = i;
                    fields.forEach(f => f.value = r[Number(f.dataset.col)] || '');
                    form.querySelector('[type=submit]').textContent = 'Update Asset';
                    panel.open = true;
                    panel.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            };
            document.getElementById('asset-status-form').onsubmit = e => {
                e.preventDefault();
                const i = Number(document.getElementById('status-row-index').value),
                    selected = document.querySelector('input[name="asset-status"]:checked');
                if (!selected || !rows[i]) return;
                rows[i][5] = selected.value;
                if (['Available', 'Inactive', 'Retired'].includes(selected.value)) rows[i][6] = '';
                filter.value = '';
                search.value = '';
                closeDialog('asset-status-modal');
                render();
            };
            search.oninput = render;
            filter.onchange = render;
            document.getElementById('export-csv').onclick = () => {
                const csv = [labels.join(','), ...rows.map(r => r.map(v => '"' + String(v ?? '').replace(/"/g,
                    '""') + '"').join(','))].join('\n');
                const a = document.createElement('a');
                a.href = URL.createObjectURL(new Blob([csv], {
                    type: 'text/csv'
                }));
                a.download = 'assets.csv';
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
