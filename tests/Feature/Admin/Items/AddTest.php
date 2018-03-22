<?php
declare(strict_types = 1);

namespace Tests\Feature\Admin\Items;

use App\Entity\Item;
use App\Repository\Item\ItemRepository;
use App\Services\Item\Image\Hashing\Hasher;
use App\Services\Item\Image\Image;
use App\Services\Item\Type;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AddTest extends TestCase
{
    public function testItemWithDefaultImage(): void
    {
        $this->transaction();
        $this->authAdmin();
        $name = 'example item';
        $description = 'description of the example item';
        $itemType = Type::ITEM;
        $gameId = '112';

        $response = $this->post(route('admin.items.add'), [
            'name' => $name,
            'description' => $description,
            'item_type' => $itemType,
            'image_type' => 'default',
            'game_id' => $gameId,
            'enchantments' => json_encode([])
        ]);

        $response->assertStatus(200);

        $repository = $this->app->make(ItemRepository::class);
        /** @var Item $item */
        $item = $repository->findAll()[0];
        self::assertNotNull($item);
        self::assertEquals($name, $item->getName());
        self::assertEquals($description, $item->getDescription());
        self::assertEquals($itemType, $item->getType());
        self::assertNull($item->getImage());
        self::assertEquals($gameId, $item->getGameId());
        self::assertNull($item->getExtra());

        $this->rollback();
    }

    public function testItemWithUploadedImage(): void
    {
        $this->transaction();
        $this->authAdmin();

        $path = 'tests/Feature/Admin/Items';
        $originalPath = $this->app->basePath("{$path}/coal_ore_original.png");
        $uploadablePath = $this->app->basePath("{$path}/coal_ore.png");
        // Copy the file as it will removed when it is uploaded.
        \File::copy($originalPath, $uploadablePath);

        $file = new UploadedFile($uploadablePath, 'coal_ore.png', 'image/png', null, null, true);

        $name = 'Coal ore';
        $itemType = Type::ITEM;
        $gameId = '16';

        $response = $this->post(route('admin.items.add'), [
            'name' => $name,
            'item_type' => $itemType,
            'image_type' => 'upload',
            'file' => $file,
            'game_id' => $gameId,
            'enchantments' => json_encode([])
        ]);

        $response->assertStatus(200);

        $hasher = $this->app->make(Hasher::class);
        $filename = "{$hasher->make($originalPath)}.{$file->getClientOriginalExtension()}";
        self::assertFileExists(Image::absolutePath($filename));

        $repository = $this->app->make(ItemRepository::class);
        /** @var Item $item */
        $item = $repository->findAll()[0];
        self::assertNotNull($item);
        self::assertEquals($name, $item->getName());
        self::assertNull($item->getDescription());
        self::assertEquals($itemType, $item->getType());
        self::assertEquals($filename, $item->getImage());
        self::assertEquals($gameId, $item->getGameId());
        self::assertNull($item->getExtra());

        // Delete uploaded image.
        \File::delete(Image::absolutePath($filename));

        $this->rollback();
    }

    public function testItemWithBrowseImage(): void
    {
        $this->transaction();
        $this->authAdmin();

        $filename = 'coal_ore.png';
        $filePath = public_path("img/shop/items/{$filename}");
        \File::copy(
            $this->app->basePath("tests/Feature/Admin/Items/coal_ore_original.png"),
            $filePath
        );

        $name = 'Coal ore';
        $description = '';
        $itemType = Type::ITEM;
        $gameId = '16';
        $extra = 'lorem ipsum';

        $response = $this->post(route('admin.items.add'), [
            'name' => $name,
            'description' => $description,
            'item_type' => $itemType,
            'image_type' => 'browse',
            'image_name' => $filename,
            'game_id' => $gameId,
            'extra' => $extra,
            'enchantments' => json_encode([])
        ]);

        $response->assertStatus(200);
        $repository = $this->app->make(ItemRepository::class);
        /** @var Item $item */
        $item = $repository->findAll()[0];
        self::assertNotNull($item);
        self::assertEquals($name, $item->getName());
        self::assertEquals($description, $item->getDescription());
        self::assertEquals($itemType, $item->getType());
        self::assertEquals($filename, $item->getImage());
        self::assertEquals($gameId, $item->getGameId());
        self::assertEquals($extra, $item->getExtra());

        // Delete copied file.
        \File::delete($filePath);

        $this->rollback();
    }

    public function testPermgroupWithDefaultImage(): void
    {
        $this->transaction();
        $this->authAdmin();
        $name = 'example permgroup';
        $itemType = Type::PERMGROUP;
        $gameId = '112';
        $extra = 'Pol, a bene abactus.';

        $response = $this->post(route('admin.items.add'), [
            'name' => $name,
            'item_type' => $itemType,
            'image_type' => 'default',
            'game_id' => $gameId,
            'extra' => $extra,
            'enchantments' => json_encode([])
        ]);

        $response->assertStatus(200);

        $repository = $this->app->make(ItemRepository::class);
        /** @var Item $item */
        $item = $repository->findAll()[0];
        self::assertNotNull($item);
        self::assertEquals($name, $item->getName());
        self::assertNull($item->getDescription());
        self::assertEquals($itemType, $item->getType());
        self::assertNull($item->getImage());
        self::assertEquals($gameId, $item->getGameId());
        self::assertEquals($extra, $item->getExtra());

        $this->rollback();
    }
}
