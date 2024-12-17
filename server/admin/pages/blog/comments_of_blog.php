<?php
session_start(); // Start the session
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login/login'); // Redirect to login page if not logged in
    exit();
}
?>

<?php
// Include database connection
include('../../database/config.php');

// Pagination setup
$limit = 5; // Number of categories per page
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start = ($page - 1) * $limit;

// Fetch all comments with associated blog titles
$sql = "SELECT comments_of_blog.id, comments_of_blog.name, comments_of_blog.email, comments_of_blog.message, comments_of_blog.blog_id, blog.title AS blog_title 
        FROM comments_of_blog 
        JOIN blog ON comments_of_blog.blog_id = blog.id LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);

// Debug: Check if the query runs successfully
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
}

// Count total categories for pagination
$countQuery = "SELECT COUNT(id) FROM comments_of_blog";
$countResult = mysqli_query($conn, $countQuery);
$totalRows = mysqli_fetch_array($countResult)[0];
$totalPages = ceil($totalRows / $limit);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments of Blogs - Oshin Sports Academy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php include '../../partials/header_link.php' ?>
</head>

<body>

    <div class="container-scroller">
        <?php include '../../partials/_sidebar.php' ?>
        <div class="container-fluid page-body-wrapper">
            <?php include '../../partials/_navbar.php' ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container">
                        <h2 class="text-center">Comments on Blogs</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>On This Blog</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $serialNo = $start + 1;
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $serialNo++ . "</td>";
                                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                                            echo "<td><a href='view_blog?id=" . $row['blog_id'] . "'>" . htmlspecialchars($row['blog_title']) . "</a></td>";
                                            echo "<td>
                                                    <a href='delete_comment?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this comment?\");'>Delete</a>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center'>No comments found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <nav style="margin-top: 20px;" aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                                        <a class="page-link" href="comments_of_blog?page=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>

                    </div>
                </div>

                <?php include '../../partials/_footer.php' ?>
            </div>
        </div>
    </div>

    <?php include '../../partials/script_links.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
