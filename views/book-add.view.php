<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>
<main>
    <form class="max-w-md mx-auto mt-8" method="POST">
        <div class="space-y-8">
            <div class="border-b border-gray-900/10 pb-8">
                <h2 class="text-xl font-bold leading-8 text-gray-900">Book Details</h2>
                <div class="mt-8 space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <input type="text" name="title" id="title" autocomplete="title" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <?php displayError($errors, 'title'); ?>

                    <div>
                        <label for="author" class="block text-sm font-medium leading-6 text-gray-900">Author</label>
                        <input type="text" name="author" id="author" autocomplete="author" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <?php displayError($errors, 'author'); ?>

                    <div>
                        <label for="publishing_date" class="block text-sm font-medium leading-6 text-gray-900">Publishing Date</label>
                        <input type="text" name="publishing_date" id="publishing_date" autocomplete="publishing_date" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <?php displayError($errors, 'publishing_date'); ?>

                    <div>
                        <label for="cover_image" class="block text-sm font-medium leading-6 text-gray-900">Cover Image URL</label>
                        <input type="text" name="cover_image" id="cover_image" autocomplete="cover_image" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <?php displayError($errors, 'cover_image'); ?>

                    <div>
                        <label for="summary" class="block text-sm font-medium leading-6 text-gray-900">Summary</label>
                        <input type="text" name="summary" id="summary" autocomplete="summary" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <?php displayError($errors, 'summary'); ?>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-x-4">
            <a href="/books" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100 focus:outline-none focus:ring-2">Add</button>
        </div>
    </form>
</main>


<?php require('partials/footer.php') ?>