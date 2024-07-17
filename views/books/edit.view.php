<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('views/partials/nav.php')) ?>
<?php require(base_path('views/partials/banner.php')) ?>

<main class="min-h-screen flex flex-col items-center justify-start py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden w-full max-w-4xl p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Edit <?= htmlspecialchars($book['title']) ?></h2>
                <form method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" value="<?= htmlspecialchars($book['title']) ?>" class="mt-1 block w-full" >
                        <?php displayError($errors, 'title'); ?>
                    </div>

                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                        <input type="text" name="author" id="author" value="<?= htmlspecialchars($book['author']) ?>" class="mt-1 block w-full" >
                        <?php displayError($errors, 'author'); ?>
                    </div>

                    <div>
                        <label for="publishing_date" class="block text-sm font-medium text-gray-700">Publishing Date</label>
                        <input type="date" name="publishing_date" id="publishing_date" value="<?= htmlspecialchars($book['publishing_date']) ?>" class="mt-1 block w-full" >
                        <?php displayError($errors, 'publishing_date'); ?>
                    </div>

                    <div>
                        <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                        <input type="file" name="cover_image" id="cover_image" class="mt-1 block w-full">
                        <?php displayError($errors, 'cover_image'); ?>
                    </div>

                    <div>
                        <label for="summary" class="block text-sm font-medium text-gray-700">Summary</label>
                        <textarea name="summary" id="summary" class="mt-1 block w-full" rows="5"><?= htmlspecialchars($book['summary']) ?></textarea>
                        <?php displayError($errors, 'summary'); ?>
                    </div>

                    <div class="mt-6 flex justify-end gap-x-4">
                        <a href="/book?id=<?= $book['id'] ?>" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100 focus:outline-none focus:ring-2">Edit</button>
                    </div>
                </form>
            </div>
            <div>
                <img src="<?= '\\'.htmlspecialchars($book['cover_image']) ?>" alt="<?= htmlspecialchars($book['title']) ?>" class="rounded-lg bg-gray-100 max-w-xs">
            </div>
        </div>
    </div>
</main>

<?php require(base_path('views/partials/footer.php')) ?>