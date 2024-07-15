<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Get the delete alert associated with this delete button
                const deleteAlert = button.nextElementSibling;

                // Hide all delete alerts first
                const allDeleteAlerts = document.querySelectorAll('.delete-alert');
                allDeleteAlerts.forEach(alert => {
                    alert.classList.add('hidden');
                });

                // Toggle the visibility of the delete alert for this button
                deleteAlert.classList.toggle('hidden');
            });
        });
    });
</script>
<main class="min-h-screen flex flex-col items-center justify-start py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden w-full max-w-4xl p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?= htmlspecialchars($book['title']) ?></h2>
                <p class="mt-4 text-gray-500"><?= nl2br(htmlspecialchars($book['summary'])) ?></p>

                <dl class="mt-4 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2 sm:gap-y-4 lg:gap-x-8">
                    <div class="border-t border-gray-200 pt-2">
                        <dt class="font-medium text-gray-900">Author</dt>
                        <dd class="mt-2 text-sm text-gray-500"><?= htmlspecialchars($book['author']) ?></dd>
                    </div>
                    <div class="border-t border-gray-200 pt-2">
                        <dt class="font-medium text-gray-900">Publishing Date</dt>
                        <dd class="mt-2 text-sm text-gray-500"><?= htmlspecialchars(date('F j, Y', strtotime($book['publishing_date']))) ?></dd>
                    </div>
                </dl>
                <a href="book/edit?id=<?= htmlspecialchars($book['id']) ?>" class="mt-4 inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Edit Book
                </a>
                <!-- Delete Book Button with Confirmation -->
                <div class="relative inline-block ml-2">
                    <button class="delete-button inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Delete Book
                    </button>
                    <div class="delete-alert absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-2 px-4 hidden">
                        <p class="mb-2">Are you sure you want to delete this book?</p>
                        <button class="confirm-delete inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-2">
                            Yes
                        </button>
                        <button class="cancel-delete inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <img src="<?= htmlspecialchars($book['cover_image']) ?>" alt="<?= htmlspecialchars($book['title']) ?>" class="rounded-lg bg-gray-100 w-full">
            </div>
        </div>
    </div>
</main>


<?php require('partials/footer.php') ?>