<?php
session_start(); // Start the session
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: pages/login/login'); // Redirect to login page if not logged in
    exit();
}
?>

<?php
include('database/config.php');

// Fetch counts for statistical overview
$blogsCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM blog"))['count'];
$categoriesCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM blog_category"))['count'];
$galleryCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM gallery"))['count'];
$testimonialsCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM testimonials"))['count'];
$inquiryCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM inquiry"))['count'];
$comments_of_blogCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM comments_of_blog"))['count'];

// Fetch latest entries for the latest activity section
$latestBlogs = mysqli_query($conn, "SELECT title, date_created FROM blog ORDER BY date_created DESC LIMIT 5");
$latestinquiry = mysqli_query($conn, "SELECT name, email, message, date_created FROM inquiry ORDER BY date_created DESC LIMIT 5");
$latestTestimonials = mysqli_query($conn, "SELECT name, relation, description, date_created FROM testimonials ORDER BY date_created DESC LIMIT 5");

// Fetch monthly inquiry data for chart
$inquiryPerMonth = mysqli_query($conn, "
    SELECT MONTHNAME(date_created) as month, COUNT(id) as count 
    FROM inquiry 
    WHERE YEAR(date_created) = YEAR(CURRENT_DATE)
    GROUP BY MONTH(date_created)
    ORDER BY MONTH(date_created);
");

// Fetch blog categories and blog count per category for the chart
$blogsPerCategory = mysqli_query($conn, "
    SELECT blog_category.category, COUNT(blog.id) AS blog_count 
    FROM blog 
    JOIN blog_category ON blog.category = blog_category.id 
    GROUP BY blog.category;
");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Oshin Sports Academy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <?php include 'dashboard-partials/header_link.php' ?>
</head>

<body>
    <div class="container-scroller">
        <?php include 'dashboard-partials/_sidebar.php' ?>

        <div class="container-fluid page-body-wrapper">
            <?php include 'dashboard-partials/_navbar.php' ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Overview Stats -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4>Total Blogs</h4>
                                    <p><?= $blogsCount ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4>Total Categories</h4>
                                    <p><?= $categoriesCount ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4>Total Gallery Images</h4>
                                    <p><?= $galleryCount ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4>Total Testimonials</h4>
                                    <p><?= $testimonialsCount ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4>Total inquiry</h4>
                                    <p><?= $inquiryCount ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4>Total comments_of_blog</h4>
                                    <p><?= $comments_of_blogCount ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Section -->
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <canvas id="blogsPerCategoryChart"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="inquiryPerMonthChart"></canvas>
                        </div>
                    </div>

                    <!-- Latest Activity Section -->
                    <div class="row mt-5">
                        <div class="col-md-4">
                            <h4>Latest Blogs</h4>
                            <ul class="list-group">
                                <?php while ($blog = mysqli_fetch_assoc($latestBlogs)) : ?>
                                    <li class="list-group-item">
                                        <strong><?= $blog['title'] ?></strong><br>
                                        <small>Created on: <?= $blog['date_created'] ?></small>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Latest inquiry</h4>
                            <ul class="list-group">
                                <?php while ($inquiry = mysqli_fetch_assoc($latestinquiry)) : ?>
                                    <li class="list-group-item">
                                        <strong><?= $inquiry['name'] ?></strong> (<?= $inquiry['email'] ?>)<br>
                                        <small><?= $inquiry['message'] ?></small><br>
                                        <small>Received on: <?= $inquiry['date_created'] ?></small>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Latest Testimonials</h4>
                            <ul class="list-group">
                                <?php while ($testimonial = mysqli_fetch_assoc($latestTestimonials)) : ?>
                                    <li class="list-group-item">
                                        <strong><?= $testimonial['name'] ?> (<?= $testimonial['relation'] ?>)</strong><br>
                                        <small><?= $testimonial['description'] ?></small><br>
                                        <small>Added on: <?= $testimonial['date_created'] ?></small>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- inquiry Section with DataTable -->
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h4>All inquiry</h4>
                            <div class="table-responsive">
                            <table id="inquiryTable" class="display">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $serialNo = 1;
                                    $allinquiry = mysqli_query($conn, "SELECT * FROM inquiry ORDER BY date_created DESC");
                                    while ($inquiry = mysqli_fetch_assoc($allinquiry)) :
                                    ?>
                                        <tr>
                                            <td><?= $serialNo++; ?></td>
                                            <td><?= $inquiry['name'] ?></td>
                                            <td><?= $inquiry['email'] ?></td>
                                            <td><?= $inquiry['message'] ?></td>
                                            <td><?= $inquiry['date_created'] ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include 'dashboard-partials/_footer.php' ?>
            </div>
        </div>
    </div>

    <?php include 'dashboard-partials/script_links.php' ?>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#inquiryTable').DataTable();
        });

        // Blogs Per Category Chart
        const blogsPerCategoryData = {
            labels: [<?php while ($row = mysqli_fetch_assoc($blogsPerCategory)) { echo '"' . $row['category'] . '",'; } ?>],
            datasets: [{
                label: 'Blogs per Category',
                data: [<?php mysqli_data_seek($blogsPerCategory, 0); while ($row = mysqli_fetch_assoc($blogsPerCategory)) { echo $row['blog_count'] . ','; } ?>],
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
            }]
        };

        const blogsPerCategoryCtx = document.getElementById('blogsPerCategoryChart').getContext('2d');
        new Chart(blogsPerCategoryCtx, {
            type: 'bar',
            data: blogsPerCategoryData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // inquiry Per Month Chart
        const inquiryPerMonthData = {
            labels: [<?php while ($row = mysqli_fetch_assoc($inquiryPerMonth)) { echo '"' . $row['month'] . '",'; } ?>],
            datasets: [{
                label: 'inquiry per Month',
                data: [<?php mysqli_data_seek($inquiryPerMonth, 0); while ($row = mysqli_fetch_assoc($inquiryPerMonth)) { echo $row['count'] . ','; } ?>],
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
            }]
        };

        const inquiryPerMonthCtx = document.getElementById('inquiryPerMonthChart').getContext('2d');
        new Chart(inquiryPerMonthCtx, {
            type: 'line',
            data: inquiryPerMonthData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>
