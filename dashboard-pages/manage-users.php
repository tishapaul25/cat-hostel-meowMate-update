<?php
// Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Sync session with cookies
if (isset($_COOKIE['role'])) {
    $_SESSION['role'] = $_COOKIE['role'];
}
if (isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
}

// Only super_admin can access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'super_admin') {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

// Connect DB
require_once 'database.php';
$conn = getDatabaseConnection();

// 🔹 Handle POST request for role update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $response = ['success' => false, 'message' => 'Something went wrong'];

    if (isset($_POST['user_id'], $_POST['role'])) {
        $userId = intval($_POST['user_id']);
        $newRole = $_POST['role'];

        $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
        $stmt->bind_param("si", $newRole, $userId);

        if ($stmt->execute()) {
            $response = ['success' => true, 'message' => "User role updated to {$newRole}"];
        } else {
            $response = ['success' => false, 'message' => 'Database update failed'];
        }

        $stmt->close();
    } else {
        $response = ['success' => false, 'message' => 'Invalid parameters'];
    }

    echo json_encode($response);
    exit;
}

// Fetch users for display
$result = $conn->query("SELECT * FROM users ORDER BY id DESC");
$users = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>


<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Manage Users</h2>
            <p class="text-gray-600 mt-1">Control user accounts and admin privileges</p>
        </div>
        <div class="flex items-center space-x-3">
            <div class="relative">
                <input type="text" id="searchUsers" placeholder="Search users..."
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent w-64">
                <i data-lucide="search"
                    class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
            </div>
            <select id="roleFilter"
                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <option value="">All Roles</option>
                <option value="customer">Customers</option>
                <option value="provider">Providers</option>
                <option value="vet">Veterinarians</option>
                <option value="admin">Admins</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i data-lucide="users" class="w-6 h-6 text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo count($users); ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i data-lucide="shield-check" class="w-6 h-6 text-green-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Admins</p>
                    <p class="text-2xl font-bold text-gray-900">
                        <?php echo count(array_filter($users, function ($u) {
                            return $u['role'] == 'admin';
                        })); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i data-lucide="heart" class="w-6 h-6 text-purple-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Customers</p>
                    <p class="text-2xl font-bold text-gray-900">
                        <?php echo count(array_filter($users, function ($u) {
                            return $u['role'] === 'customer';
                        })); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-orange-100 rounded-lg">
                    <i data-lucide="home" class="w-6 h-6 text-orange-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Providers</p>
                    <p class="text-2xl font-bold text-gray-900">
                        <?php echo count(array_filter($users, function ($u) {
                            return $u['role'] === 'provider';
                        })); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">User Accounts</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full" id="usersTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Username</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Entry
                            Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($users as $user): ?>
                        <tr class="hover:bg-gray-50 transition-colors user-row" data-role="<?php echo $user['role']; ?>">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #<?php echo $user['id']; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                        <?php echo strtoupper(substr($user['id'], 0, 1)); ?>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">
                                            <?php echo htmlspecialchars($user['username']); ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <?php echo htmlspecialchars($user['first_name']); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?php echo htmlspecialchars($user['email']); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?php echo htmlspecialchars($user['phone']); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                <?php
                                switch ($user['role']) {
                                    case 'admin':
                                        echo 'bg-red-100 text-red-800';
                                        break;
                                    case 'vet':
                                        echo 'bg-blue-100 text-blue-800';
                                        break;
                                    case 'provider':
                                        echo 'bg-green-100 text-green-800';
                                        break;
                                    case 'customer':
                                        echo 'bg-purple-100 text-purple-800';
                                        break;
                                    case 'super_admin':
                                        echo 'bg-gray-800 text-gray-100';
                                        break;
                                    default:
                                        echo 'bg-gray-100 text-gray-800';
                                }
                                ?>">
                                    <?php if ($user['role']): ?>
                                        <i data-lucide="shield-check" class="w-3 h-3 mr-1"></i>
                                    <?php endif; ?>
                                    <?php echo ucfirst($user['role']); ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?php echo date('M j, Y', strtotime($user['entry_date'])); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <?php if ($user['role'] !== 'admin' && $user['role'] !== 'super_admin' && $user['id'] != $_SESSION['user_id']): ?>
                                        <button
                                            onclick="makeAdmin(<?php echo $user['id']; ?>, '<?php echo htmlspecialchars($user['username']); ?>')"
                                            class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                                            <i data-lucide="shield-plus" class="w-3 h-3 mr-1"></i>
                                            Make Admin
                                        </button>
                                    <?php elseif ($user['role'] === 'admin' && $user['id'] != $_SESSION['user_id']): ?>
                                        <button
                                            onclick="removeAdmin(<?php echo $user['id']; ?>, '<?php echo htmlspecialchars($user['username']); ?>')"
                                            class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors">
                                            <i data-lucide="shield-minus" class="w-3 h-3 mr-1"></i>
                                            Remove Admin
                                        </button>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-medium text-gray-500">
                                            <i data-lucide="lock" class="w-3 h-3 mr-1"></i>
                                            Protected
                                        </span>
                                    <?php endif; ?>

                                    <?php if ($user['id'] != $_SESSION['user_id'] && $user['role'] !== 'super_admin'): ?>
                                        <button
                                            onclick="deleteUser(<?php echo $user['id']; ?>, '<?php echo htmlspecialchars($user['username']); ?>')"
                                            class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                            <i data-lucide="trash-2" class="w-3 h-3 mr-1"></i>
                                            Delete
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div id="modalIcon" class="mx-auto flex items-center justify-center h-12 w-12 rounded-full mb-4">
            </div>
            <h3 class="text-lg font-medium text-gray-900" id="modalTitle">Confirm Action</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500" id="modalMessage">
                    Are you sure you want to perform this action?
                </p>
            </div>
            <div class="flex items-center justify-center space-x-4 mt-4">
                <button id="cancelBtn"
                    class="px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-md shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Cancel
                </button>
                <button id="confirmBtn"
                    class="px-4 py-2 text-white text-base font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2">
                    Confirm
                </button>
            </div>
        </div>
    </div>
</div>

<div id="toast" class="fixed top-4 right-4 z-50 hidden">
    <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-4 max-w-sm">
        <div class="flex items-center">
            <div id="toastIcon" class="flex-shrink-0">
            </div>
            <div class="ml-3">
                <p id="toastMessage" class="text-sm font-medium text-gray-900"></p>
            </div>
            <button onclick="hideToast()"
                class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
    </div>
</div>

<script>
    let currentAction = null;
    let currentUserId = null;

    // Search functionality
    document.getElementById('searchUsers').addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('.user-row');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Role filter functionality
    document.getElementById('roleFilter').addEventListener('change', function () {
        const selectedRole = this.value;
        const rows = document.querySelectorAll('.user-row');

        rows.forEach(row => {
            const userRole = row.getAttribute('data-role');
            if (selectedRole === '' || userRole === selectedRole) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    function makeAdmin(userId, userName) {
        showConfirmationModal(
            'Make Admin',
            `Are you sure you want to give admin privileges to <strong>${userName}</strong>?`,
            'make_admin',
            userId,
            'bg-green-100',
            'text-green-600',
            'shield-plus',
            'bg-green-600 hover:bg-green-700 focus:ring-green-500'
        );
    }

    function removeAdmin(userId, userName) {
        showConfirmationModal(
            'Remove Admin',
            `Are you sure you want to remove admin privileges from <strong>${userName}</strong>?`,
            'remove_admin',
            userId,
            'bg-yellow-100',
            'text-yellow-600',
            'shield-minus',
            'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500'
        );
    }

    function deleteUser(userId, userName) {
        showConfirmationModal(
            'Delete User',
            `Are you sure you want to permanently delete <strong>${userName}</strong>? This action cannot be undone.`,
            'delete_user',
            userId,
            'bg-red-100',
            'text-red-600',
            'trash-2',
            'bg-red-600 hover:bg-red-700 focus:ring-red-500'
        );
    }

    function showConfirmationModal(title, message, action, userId, iconBg, iconColor, iconName, btnClass) {
        currentAction = action;
        currentUserId = userId;

        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalMessage').innerHTML = message;

        const modalIcon = document.getElementById('modalIcon');
        modalIcon.className = `mx-auto flex items-center justify-center h-12 w-12 rounded-full mb-4 ${iconBg}`;
        modalIcon.innerHTML = `<i data-lucide="${iconName}" class="w-6 h-6 ${iconColor}"></i>`;

        const confirmBtn = document.getElementById('confirmBtn');
        confirmBtn.className = `px-4 py-2 text-white text-base font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 ${btnClass}`;

        document.getElementById('confirmationModal').classList.remove('hidden');
        lucide.createIcons();
    }

    function hideConfirmationModal() {
        document.getElementById('confirmationModal').classList.add('hidden');
        currentAction = null;
        currentUserId = null;
    }
    function performAction() {
        if (!currentAction || !currentUserId) return;

        let newRole = '';
        if (currentAction === 'make_admin') newRole = 'super_admin';
        else if (currentAction === 'remove_admin') newRole = 'customer'; // fallback role

        fetch('dashboard.php?page=manageuser', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=update_role&user_id=${currentUserId}&role=${newRole}`
        })

            .then(res => res.json())
            .then(data => {
                hideConfirmationModal();
                showToast(data.message, data.success);
                if (data.success) setTimeout(() => location.reload(), 1000);
            })
            .catch(err => {
                hideConfirmationModal();
                showToast('Request failed', false);
            });
    }





    function showToast(message, isSuccess = true) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');
        const toastIcon = document.getElementById('toastIcon');

        toastMessage.textContent = message;

        if (isSuccess) {
            toastIcon.innerHTML = '<i data-lucide="check-circle" class="w-5 h-5 text-green-600"></i>';
        } else {
            toastIcon.innerHTML = '<i data-lucide="x-circle" class="w-5 h-5 text-red-600"></i>';
        }

        toast.classList.remove('hidden');
        lucide.createIcons();

        // Auto hide after 5 seconds
        setTimeout(() => {
            hideToast();
        }, 5000);
    }

    function hideToast() {
        document.getElementById('toast').classList.add('hidden');
    }

    // Event listeners
    document.getElementById('cancelBtn').addEventListener('click', hideConfirmationModal);
    document.getElementById('confirmBtn').addEventListener('click', performAction);

    // Close modal on background click
    document.getElementById('confirmationModal').addEventListener('click', function (e) {
        if (e.target === this) {
            hideConfirmationModal();
        }
    });

    // Initialize icons
    lucide.createIcons();
</script>