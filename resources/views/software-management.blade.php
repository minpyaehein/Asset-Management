<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Software &amp; Warranty · Stockwise</title>
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

<body data-agent-edit="yes" data-page="software-management">
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
                            href="employees.html"><span class="nav-icon">♙</span>Employees</a><a class="nav-link"
                            data-nav="checkin-checkout" href="checkin-checkout.html"><span
                                class="nav-icon">⇄</span>Check-in / Check-out</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Software</div>
                    <div class="nav-list"><a class="nav-link active" data-nav="software-management"
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
                <div class="crumb">Workspace / Software &amp; Warranty</div>
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
                        <div class="eyebrow">Software workspace</div>
                        <h1>Software &amp; Warranty</h1>
                        <p>Licenses, installed software and warranty expiry in one place.</p>
                    </div>
                    <div class="button-row"><button class="btn" id="export-active" type="button">⇩ Export
                            Current Tab</button></div>
                </div>
                <div class="tab-bar" role="tablist"><button class="tab-button active" data-tab="licenses"
                        type="button">Software Licenses</button><button class="tab-button" data-tab="installations"
                        type="button">Software Installations</button><button class="tab-button" data-tab="warranty"
                        type="button">Warranty &amp; Expiry</button></div>
                <section class="module-section"
                    data-cols='[{"label": "Product", "index": 0}, {"label": "Vendor", "index": 1}, {"label": "Purchased Seats", "index": 3}, {"label": "Used Seats", "calc": "used"}, {"label": "Expiry Date", "index": 4}]'
                    data-key="stockwise_software-management_licenses" data-legacy-key="stockwise_software-licenses"
                    data-module="licenses"
                    data-seed='[["Microsoft 365 Business", "Microsoft", "LIC-0001", "80", "2026-11-24", "Office productivity suite"], ["Adobe Creative Cloud", "Adobe", "LIC-0002", "16", "2026-11-01", "Design team subscription"]]'
                    id="section-licenses">
                    <div class="section-intro">
                        <div>
                            <h2>Software Licenses</h2>
                            <p>Manage license keys, purchased seats and expiry dates.</p>
                        </div>
                    </div>
                    <details class="panel form-panel" id="add-panel-licenses">
                        <summary>Add New Software License</summary>
                        <div class="form-body">
                            <form id="form-licenses"><input name="_index" type="hidden" value="-1" />
                                <div class="form-grid">
                                    <div class="field"><label for="field_product">Product</label><input
                                            data-field="" data-label="Product" id="field_product"
                                            name="field_product" placeholder="Microsoft 365 Business" required=""
                                            type="text" value="" /></div>
                                    <div class="field"><label for="field_vendor">Vendor</label><input data-field=""
                                            data-label="Vendor" id="field_vendor" name="field_vendor"
                                            placeholder="Microsoft" required="" type="text" value="" />
                                    </div>
                                    <div class="field"><label for="field_license_key">License Key</label><input
                                            data-field="" data-label="License Key" id="field_license_key"
                                            name="field_license_key" placeholder="LIC-0003" required=""
                                            type="text" value="" /></div>
                                    <div class="field"><label for="field_purchased_seats">Purchased
                                            Seats</label><input data-field="" data-label="Purchased Seats"
                                            id="field_purchased_seats" name="field_purchased_seats" placeholder="80"
                                            required="" type="number" value="" /></div>
                                    <div class="field"><label for="field_expiry_date">Expiry Date</label><input
                                            data-field="" data-label="Expiry Date" id="field_expiry_date"
                                            name="field_expiry_date" placeholder="" required="" type="date"
                                            value="" /></div>
                                    <div class="field"><label for="field_notes">Notes</label>
                                        <textarea data-field="" data-label="Notes" id="field_notes" name="field_notes" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-footer"><button class="btn" data-clear=""
                                        type="reset">Clear</button><button class="btn primary" type="submit">Save
                                        Record</button></div>
                            </form>
                        </div>
                    </details>
                    <div class="panel">
                        <div class="panel-head">
                            <div>
                                <h2>Software Licenses Records</h2>
                                <p>Search, filter and update records. Changes are saved in this browser.</p>
                            </div><span class="count" id="count-licenses">2 records</span>
                        </div>
                        <div class="record-tools">
                            <div class="filter-wrap"><label for="filter-licenses">Filter</label><select
                                    class="record-filter" id="filter-licenses">
                                    <option value="">All records</option>
                                </select></div>
                            <div class="button-row"><button class="btn" id="export-licenses" type="button">⇩
                                    Export CSV</button></div>
                        </div>
                        <div class="table-wrap">
                            <table id="table-licenses">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Vendor</th>
                                        <th>Purchased Seats</th>
                                        <th>Used Seats</th>
                                        <th>Expiry Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Microsoft 365 Business</td>
                                        <td>Microsoft</td>
                                        <td>LIC-0001</td>
                                        <td>80</td>
                                        <td>2026-11-24</td>
                                        <td>Office productivity suite</td>
                                    </tr>
                                    <tr>
                                        <td>Adobe Creative Cloud</td>
                                        <td>Adobe</td>
                                        <td>LIC-0002</td>
                                        <td>16</td>
                                        <td>2026-11-01</td>
                                        <td>Design team subscription</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <section class="module-section"
                    data-cols='[{"label": "Asset Tag", "index": 0}, {"label": "License", "index": 1}, {"label": "Installed Date", "index": 2}, {"label": "Installed By", "index": 3}]'
                    data-key="stockwise_software-management_installations"
                    data-legacy-key="stockwise_software-installations" data-module="installations"
                    data-seed='[["AST-1001", "LIC-0002 — Adobe Creative Cloud", "2026-10-08", "Aung Min", "Design application installed"], ["AST-1003", "LIC-0001 — Microsoft 365 Business", "2026-09-23", "Su Su Hlaing", "Office suite installed"]]'
                    hidden="" id="section-installations">
                    <div class="section-intro">
                        <div>
                            <h2>Software Installations</h2>
                            <p>Register software against an asset and a valid license.</p>
                        </div>
                    </div>
                    <details class="panel form-panel" id="add-panel-installations">
                        <summary>Add New Software Installation</summary>
                        <div class="form-body">
                            <form id="form-installations"><input name="_index" type="hidden" value="-1" />
                                <div class="form-grid">
                                    <div class="field"><label for="field_asset_tag">Asset Tag</label><select
                                            data-field="" data-label="Asset Tag" id="field_asset_tag"
                                            name="field_asset_tag" required="">
                                            <option value="AST-1001">AST-1001</option>
                                            <option value="AST-1002">AST-1002</option>
                                            <option value="AST-1003">AST-1003</option>
                                        </select></div>
                                    <div class="field"><label for="field_license">License</label><select
                                            data-field="" data-label="License" id="field_license"
                                            name="field_license" required="">
                                            <option value="LIC-0001 — Microsoft 365 Business">LIC-0001 — Microsoft 365
                                                Business</option>
                                            <option value="LIC-0002 — Adobe Creative Cloud">LIC-0002 — Adobe Creative
                                                Cloud</option>
                                        </select></div>
                                    <div class="field"><label for="field_installed_date">Installed Date</label><input
                                            data-field="" data-label="Installed Date" id="field_installed_date"
                                            name="field_installed_date" placeholder="" required="" type="date"
                                            value="" /></div>
                                    <div class="field"><label for="field_installed_by">Installed By</label><input
                                            data-field="" data-label="Installed By" id="field_installed_by"
                                            name="field_installed_by" placeholder="Employee name" type="text"
                                            value="" /></div>
                                    <div class="field"><label for="field_notes">Notes</label>
                                        <textarea data-field="" data-label="Notes" id="field_notes" name="field_notes" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-footer"><button class="btn" data-clear=""
                                        type="reset">Clear</button><button class="btn primary" type="submit">Save
                                        Record</button></div>
                            </form>
                        </div>
                    </details>
                    <div class="panel">
                        <div class="panel-head">
                            <div>
                                <h2>Software Installations Records</h2>
                                <p>Search, filter and update records. Changes are saved in this browser.</p>
                            </div><span class="count" id="count-installations">2 records</span>
                        </div>
                        <div class="record-tools">
                            <div class="filter-wrap"><label for="filter-installations">Filter</label><select
                                    class="record-filter" id="filter-installations">
                                    <option value="">All records</option>
                                </select></div>
                            <div class="button-row"><button class="btn" id="export-installations"
                                    type="button">⇩ Export CSV</button></div>
                        </div>
                        <div class="table-wrap">
                            <table id="table-installations">
                                <thead>
                                    <tr>
                                        <th>Asset Tag</th>
                                        <th>License</th>
                                        <th>Installed Date</th>
                                        <th>Installed By</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>AST-1001</td>
                                        <td>LIC-0002 — Adobe Creative Cloud</td>
                                        <td>2026-10-08</td>
                                        <td>Aung Min</td>
                                        <td>Design application installed</td>
                                    </tr>
                                    <tr>
                                        <td>AST-1003</td>
                                        <td>LIC-0001 — Microsoft 365 Business</td>
                                        <td>2026-09-23</td>
                                        <td>Su Su Hlaing</td>
                                        <td>Office suite installed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <section class="module-section"
                    data-cols='[{"label": "Asset Tag", "index": 0}, {"label": "Product / Agreement", "index": 1}, {"label": "Vendor", "index": 2}, {"label": "Reference", "index": 3}, {"label": "Warranty / Expiry Date", "index": 4}, {"label": "Owner", "index": 5}, {"label": "Status", "index": 6}]'
                    data-key="stockwise_software-management_warranty"
                    data-legacy-key="stockwise_software-warranty-expiry" data-module="warranty"
                    data-seed='[["AST-1001", "MacBook Pro 14-inch", "Apple", "WR-1001", "2027-10-14", "Aung Min", "Active"], ["AST-1002", "ThinkPad X1 Carbon", "Lenovo", "WR-1002", "2027-09-30", "—", "Active"]]'
                    hidden="" id="section-warranty">
                    <div class="section-intro">
                        <div>
                            <h2>Warranty &amp; Expiry</h2>
                            <p>Track asset warranty and agreement expiry status.</p>
                        </div>
                    </div>
                    <details class="panel form-panel" id="add-panel-warranty">
                        <summary>Add New Warranty / Expiry Record</summary>
                        <div class="form-body">
                            <form id="form-warranty"><input name="_index" type="hidden" value="-1" />
                                <div class="form-grid">
                                    <div class="field"><label for="field_asset_tag">Asset Tag</label><select
                                            data-field="" data-label="Asset Tag" id="field_asset_tag"
                                            name="field_asset_tag">
                                            <option value="AST-1001">AST-1001</option>
                                            <option value="AST-1002">AST-1002</option>
                                            <option value="AST-1003">AST-1003</option>
                                        </select></div>
                                    <div class="field"><label for="field_product_agreement">Product /
                                            Agreement</label><input data-field="" data-label="Product / Agreement"
                                            id="field_product_agreement" name="field_product_agreement"
                                            placeholder="Warranty or agreement name" required="" type="text"
                                            value="" /></div>
                                    <div class="field"><label for="field_vendor">Vendor</label><input data-field=""
                                            data-label="Vendor" id="field_vendor" name="field_vendor"
                                            placeholder="Vendor name" type="text" value="" /></div>
                                    <div class="field"><label for="field_reference">Reference</label><input
                                            data-field="" data-label="Reference" id="field_reference"
                                            name="field_reference" placeholder="Warranty reference" type="text"
                                            value="" /></div>
                                    <div class="field"><label for="field_warranty_expiry_date">Warranty / Expiry
                                            Date</label><input data-field="" data-label="Warranty / Expiry Date"
                                            id="field_warranty_expiry_date" name="field_warranty_expiry_date"
                                            placeholder="" required="" type="date" value="" /></div>
                                    <div class="field"><label for="field_owner">Owner</label><input data-field=""
                                            data-label="Owner" id="field_owner" name="field_owner"
                                            placeholder="Employee name" type="text" value="" /></div>
                                    <div class="field"><label for="field_status">Status</label><select
                                            data-field="" data-label="Status" id="field_status" name="field_status"
                                            required="">
                                            <option value="Active">Active</option>
                                            <option value="Expiring Soon">Expiring Soon</option>
                                            <option value="Expired">Expired</option>
                                            <option value="Inactive">Inactive</option>
                                        </select></div>
                                </div>
                                <div class="form-footer"><button class="btn" data-clear=""
                                        type="reset">Clear</button><button class="btn primary" type="submit">Save
                                        Record</button></div>
                            </form>
                        </div>
                    </details>
                    <div class="panel">
                        <div class="panel-head">
                            <div>
                                <h2>Warranty &amp; Expiry Records</h2>
                                <p>Search, filter and update records. Changes are saved in this browser.</p>
                            </div><span class="count" id="count-warranty">2 records</span>
                        </div>
                        <div class="record-tools">
                            <div class="filter-wrap"><label for="filter-warranty">Filter</label><select
                                    class="record-filter" id="filter-warranty">
                                    <option value="">All records</option>
                                </select></div>
                            <div class="button-row"><button class="btn" id="export-warranty" type="button">⇩
                                    Export CSV</button></div>
                        </div>
                        <div class="table-wrap">
                            <table id="table-warranty">
                                <thead>
                                    <tr>
                                        <th>Asset Tag</th>
                                        <th>Product / Agreement</th>
                                        <th>Vendor</th>
                                        <th>Reference</th>
                                        <th>Warranty / Expiry Date</th>
                                        <th>Owner</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>AST-1001</td>
                                        <td>MacBook Pro 14-inch</td>
                                        <td>Apple</td>
                                        <td>WR-1001</td>
                                        <td>2027-10-14</td>
                                        <td>Aung Min</td>
                                        <td>Active</td>
                                    </tr>
                                    <tr>
                                        <td>AST-1002</td>
                                        <td>ThinkPad X1 Carbon</td>
                                        <td>Lenovo</td>
                                        <td>WR-1002</td>
                                        <td>2027-09-30</td>
                                        <td>—</td>
                                        <td>Active</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
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
            const esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
            } [c]));
            const mods = {};
            document.querySelectorAll('[data-module]').forEach(sec => {
                const id = sec.dataset.module,
                    form = sec.querySelector('form'),
                    table = sec.querySelector('table'),
                    fields = [...form.querySelectorAll('[data-field]')],
                    body = table.tBodies[0],
                    search = document.getElementById('global-search'),
                    filter = sec.querySelector('.record-filter'),
                    count = document.getElementById('count-' + id),
                    panel = sec.querySelector('details');
                let rows;
                try {
                    rows = JSON.parse(localStorage.getItem(sec.dataset.key) || localStorage.getItem(sec.dataset
                        .legacyKey) || sec.dataset.seed || '[]')
                } catch (_) {
                    rows = []
                }
                if (!Array.isArray(rows)) rows = [];
                const cols = JSON.parse(sec.dataset.cols || '[]');
                mods[id] = {
                    sec,
                    form,
                    table,
                    fields,
                    body,
                    search,
                    filter,
                    count,
                    panel,
                    rows,
                    cols,
                    key: sec.dataset.key
                };

                function refillOptions() {
                    const keep = filter.value;
                    filter.innerHTML = '<option value="">All records</option>';
                    let idx = fields.findIndex(f => /status|type|vendor|category/i.test(f.dataset.label || ''));
                    if (idx < 0) idx = 0;
                    const vals = [...new Set(rows.map(r => r[idx]).filter(Boolean))].sort();
                    vals.forEach(v => {
                        const o = document.createElement('option');
                        o.value = v;
                        o.textContent = v;
                        filter.appendChild(o)
                    });
                    if (vals.includes(keep)) filter.value = keep;
                }

                function getCell(row, col) {
                    if (col.calc === 'used') {
                        const installs = mods.installations?.rows || [];
                        return installs.filter(r => String(r[1]).startsWith(String(row[2]) + ' —') || r[2] ===
                            row[0]).length;
                    }
                    if (col.calc === 'expiryStatus') {
                        const d = new Date(row[col.index || 0]),
                            today = new Date();
                        return !row[col.index || 0] ? '—' : d < today ? 'Expired' : (d - today) / 86400000 <
                            30 ? 'Expiring Soon' : 'Active';
                    }
                    return row[col.index] ?? '';
                }

                function render() {
                    body.replaceChildren();
                    rows.forEach((row, i) => {
                        if (search.value && !row.join(' ').toLowerCase().includes(search.value
                                .toLowerCase())) return;
                        if (filter.value && !row.some(v => String(v) === filter.value)) return;
                        const tr = body.insertRow();
                        tr.dataset.index = i;
                        cols.forEach(c => {
                            const td = tr.insertCell();
                            const val = getCell(row, c);
                            if (c.label === 'Status') td.innerHTML =
                                '<span class="status-chip status-' + String(val).toLowerCase()
                                .replace(/[^a-z]+/g, '-') + '">' + esc(val || '—') + '</span>';
                            else td.textContent = val || '—';
                        });
                        const action = tr.insertCell();
                        action.innerHTML =
                            '<button class="mini-btn" data-action="edit">Edit</button> ' + (role ===
                                'Admin' ?
                                '<button class="mini-btn delete" data-action="delete">Delete</button>' :
                                '');
                    });
                    localStorage.setItem(sec.dataset.key, JSON.stringify(rows));
                    count.textContent = rows.length + ' records';
                    refillOptions();
                }
                form.onsubmit = e => {
                    e.preventDefault();
                    const vals = fields.map(f => f.value.trim()),
                        i = Number(form.elements._index.value);
                    if (i >= 0) rows[i] = vals;
                    else rows.unshift(vals);
                    form.reset();
                    form.elements._index.value = '-1';
                    form.querySelector('[type=submit]').textContent = form.dataset.saveLabel ||
                        'Save Record';
                    panel.open = false;
                    render();
                };
                form.onreset = () => setTimeout(() => {
                    form.elements._index.value = '-1';
                    const b = form.querySelector('[type=submit]');
                    if (b) b.textContent = form.dataset.saveLabel || 'Save Record';
                }, 0);
                table.onclick = e => {
                    const b = e.target.closest('[data-action]');
                    if (!b) return;
                    const i = Number(b.closest('tr').dataset.index);
                    if (b.dataset.action === 'delete') {
                        if (role === 'Admin' && confirm('Delete this record?')) {
                            rows.splice(i, 1);
                            render();
                        }
                        return;
                    }
                    form.elements._index.value = i;
                    fields.forEach((f, n) => f.value = rows[i][n] || '');
                    form.querySelector('[type=submit]').textContent = 'Update Record';
                    panel.open = true;
                    panel.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                };
                search.oninput = () => Object.values(mods).forEach(m => m.render ? m.render() : null);
                filter.onchange = render;
                const exportBtn = document.getElementById('export-' + id);
                exportBtn.onclick = () => {
                    const csv = [fields.map(f => f.dataset.label).join(','), ...rows.map(r => r.map(v =>
                        '"' + String(v ?? '').replace(/"/g, '""') + '"').join(','))].join('\n');
                    const a = document.createElement('a');
                    a.href = URL.createObjectURL(new Blob([csv], {
                        type: 'text/csv'
                    }));
                    a.download = id + '.csv';
                    a.click();
                    URL.revokeObjectURL(a.href);
                };
                mods[id].render = render;
                render();
            });

            function activate(tab) {
                document.querySelectorAll('.tab-button').forEach(b => b.classList.toggle('active', b.dataset.tab ===
                    tab));
                document.querySelectorAll('.module-section').forEach(s => s.hidden = s.dataset.module !== tab);
                if (tab && location.hash !== '#' + tab) history.replaceState(null, '', location.pathname + '#' + tab);
                const active = document.getElementById('section-' + tab);
                if (active) {
                    const b = active.querySelector('.record-filter');
                    if (b) b.dispatchEvent(new Event('change'));
                }
            }
            Object.values(mods).forEach(m => m.render());
            document.querySelectorAll('.tab-button').forEach(b => b.addEventListener('click', () => activate(b.dataset
                .tab)));
            const initial = location.hash.slice(1),
                first = document.querySelector('.tab-button')?.dataset.tab;
            activate(document.querySelector('[data-tab="' + initial + '"]') ? initial : first);
            document.getElementById('export-active')?.addEventListener('click', () => {
                const active = document.querySelector('.module-section:not([hidden])');
                active?.querySelector('[id^="export-"]')?.click();
            });
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
