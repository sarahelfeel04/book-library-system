<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('views/partials/nav.php')) ?>
<?php require(base_path('views/partials/banner.php')) ?>


<main>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Books Collection</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <?php foreach ($books as $book) : ?>
                    <div class="group relative">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <a href="/book?id=<?=$book['id']?>" >
                            <img src="<?= htmlspecialchars($book['cover_image']) ?>" alt="<?= htmlspecialchars($book['title']) ?>" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </a>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="/book?id=<?= $book['id'] ?>">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        <?= htmlspecialchars($book['title']) ?>
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500"><?= htmlspecialchars($book['author']) ?></p>
                                <p class="mt-1 text-sm text-gray-500"><?= htmlspecialchars(date('Y', strtotime($book['publishing_date']))) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Add Book Button -->
                <div class="group relative">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <a href="/book/add" class="flex items-center justify-center h-full w-full text-gray-700 transition duration-300 ease-in-out transform bg-gray-200 hover:bg-gray-300 rounded-md hover:scale-105">
                            <svg class="h-12 w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </a>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <h3 class="text-sm text-gray-700">Add Book</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require(base_path('views/partials/footer.php')) ?>