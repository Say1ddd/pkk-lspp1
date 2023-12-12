<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
      DB::unprepared('CREATE TRIGGER barang_masuk_insert 
          AFTER INSERT ON barang_masuk
          FOR EACH ROW
          BEGIN
          UPDATE barang SET barang.stok = barang.stok + NEW.qty_masuk WHERE barang.id = NEW.barang_id; 
          END
      ');

      DB::unprepared('CREATE TRIGGER barang_masuk_update 
        AFTER UPDATE ON barang_masuk
        FOR EACH ROW
        BEGIN
        DECLARE new_masuk INT;
        SET new_masuk = NEW.qty_masuk - OLD.qty_masuk;
        UPDATE barang SET stok = stok + new_masuk WHERE id = NEW.barang_id; 
        END;
      ');

      DB::unprepared('CREATE TRIGGER barang_masuk_delete 
          AFTER DELETE ON barang_masuk
          FOR EACH ROW
          BEGIN
          UPDATE barang SET barang.stok = barang.stok - OLD.qty_masuk WHERE barang.id = OLD.barang_id; 
          END
      ');
      
      DB::unprepared('CREATE TRIGGER barang_keluar_insert 
          AFTER INSERT ON barang_keluar
          FOR EACH ROW
          BEGIN
          UPDATE barang SET barang.stok = barang.stok - NEW.qty_keluar WHERE barang.id = NEW.barang_id; 
          END
      ');

      DB::unprepared('CREATE TRIGGER barang_keluar_update 
        AFTER UPDATE ON barang_keluar
        FOR EACH ROW
        BEGIN
        DECLARE new_keluar INT;
        SET new_keluar = NEW.qty_keluar - OLD.qty_keluar;
        UPDATE barang SET stok = stok - new_keluar WHERE id = NEW.barang_id; 
        END;
      ');

      DB::unprepared('CREATE TRIGGER barang_keluar_delete 
          AFTER DELETE ON barang_keluar
          FOR EACH ROW
          BEGIN
          UPDATE barang SET barang.stok = barang.stok + OLD.qty_keluar WHERE barang.id = OLD.barang_id; 
          END
      ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS barang_masuk_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS barang_masuk_update');
        DB::unprepared('DROP TRIGGER IF EXISTS barang_masuk_delete');
        DB::unprepared('DROP TRIGGER IF EXISTS barang_keluar_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS barang_keluar_update');
        DB::unprepared('DROP TRIGGER IF EXISTS barang_keluar_delete');
    }
};
