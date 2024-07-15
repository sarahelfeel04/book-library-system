<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>


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
            </div>
            <div>
                <img src="<?= htmlspecialchars($book['cover_image']) ?>" alt="<?= htmlspecialchars($book['title']) ?>" class="rounded-lg bg-gray-100 w-full">
            </div>
        </div>
    </div>
</main>


<?php require('partials/footer.php') ?>