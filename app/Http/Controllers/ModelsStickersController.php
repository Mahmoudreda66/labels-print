<?php

namespace App\Http\Controllers;

use Mahmoud\Labels\Request;

class ModelsStickersController
{
    public function __construct()
    {
        mustAuth();
    }

    public function index()
    {
        $stickers = db()->prepare('SELECT *
            FROM models_stickers
            ORDER BY id DESC');
        $stickers->execute();

        $stickers = $stickers->fetchAll();

        return view('admin.models_stickers.index', compact('stickers'));
    }

    public function store()
    {
        $storeQuery = db()->prepare('INSERT
        INTO models_stickers(name, body)
        VALUES(?, ?)');
        $storeQuery->execute([
            request('name'),
            request('body')
        ]);

        if ($storeQuery->rowCount()) {
            flash('success', 'تم حفظ الملصق بنجاح');

            redirect('/models-stickers');
        }
    }

    public function print_sticker()
    {
        $id = request('id');

        $sticker = db()->prepare('SELECT body,name
            FROM models_stickers
            WHERE id = ?');
        $sticker->execute([$id]);

        $sticker = $sticker->fetch();

        if ($sticker) {
            return view('admin.models_stickers.print_sticker', compact('sticker'));
        }

        return error_view(404);
    }

    public function delete()
    {
        $id = request('id');

        $sticker = db()->prepare('DELETE
        FROM models_stickers
        WHERE id = ?');
        $sticker->execute([$id]);

        if ($sticker->rowCount()) {
            flash('success', 'تم حذف الملصق بنجاح');

            return redirect('/models-stickers');
        }

        flash('error', 'لم يتم حذف الملصق');

        return redirect('/models-stickers');
    }
}
