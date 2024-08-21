<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Laravel Library System'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
            position: fixed;
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h4 {
            margin-top: 0;
            color: #ffffff;
        }

        .sidebar .nav-link {
            color: #ffffff;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .sidebar .nav-link.active {
            background-color: #495057;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
            text-decoration: none;
        }

        .sidebar .logout-button {
            position: absolute;
            bottom: 20px;
            width: 85%;
            padding: 10px;
            background-color: #495057;
            text-align: center;
            color: #ffffff;
            border-radius: 5px;
            text-decoration: none;
        }

        .sidebar .logout-button:hover {
            background-color: #6c757d;
            text-decoration: none;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h4>LIBRARY SYSTEM</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo e(Route::currentRouteName() == 'books.index' ? 'active' : ''); ?>" href="<?php echo e(route('books.index')); ?>">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Route::currentRouteName() == 'authors.index' ? 'active' : ''); ?>" href="<?php echo e(route('authors.index')); ?>">Authors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Route::currentRouteName() == 'reports.index' ? 'active' : ''); ?>" href="<?php echo e(route('reports.index')); ?>">Reports</a>
            </li>
        </ul>
        <a class="logout-button" href="#" onclick="event.preventDefault(); confirmLogout();">
            <?php echo e(__('Logout')); ?>

        </a>

        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
    </div>

    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-FTNSXgV4ZGg2BmD+FDdTEaiYEQ22u/Xi1qdzFZc2CgNafcYfSZzNX7AXJWweU4cz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGhtu6HUP7KpcGmFH3a+9D9Ugtdrq7aYrluY7qUGJkAaVVFGHlW/aUuHNqe" crossorigin="anonymous"></script>

    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to log out?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
</body>

</html>
<?php /**PATH C:\Users\Administrator\Documents\Laravel\library app\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>