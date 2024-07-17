<?php require('views/partials/head.php') ?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/banner.php') ?>
<main>
    <form class="max-w-md mx-auto mt-8" method="POST" enctype="multipart/form-data">
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
                        <input type="date" name="publishing_date" id="publishing_date" autocomplete="publishing_date" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <?php displayError($errors, 'publishing_date'); ?>

                    <div>
                        <label for="cover_image" class="block text-sm font-medium leading-6 text-gray-900">Cover Image</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="cover_image" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
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


<?php require('views/partials/footer.php') ?>