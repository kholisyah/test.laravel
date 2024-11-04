CREATE TABLE IF NOT EXISTS "migrations"(
  "id" integer primary key autoincrement not null,
  "migration" varchar not null,
  "batch" integer not null
);
CREATE TABLE IF NOT EXISTS "users"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "email" varchar not null,
  "email_verified_at" datetime,
  "password" varchar not null,
  "remember_token" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "users_email_unique" on "users"("email");
CREATE TABLE IF NOT EXISTS "password_reset_tokens"(
  "email" varchar not null,
  "token" varchar not null,
  "created_at" datetime,
  primary key("email")
);
CREATE TABLE IF NOT EXISTS "sessions"(
  "id" varchar not null,
  "user_id" integer,
  "ip_address" varchar,
  "user_agent" text,
  "payload" text not null,
  "last_activity" integer not null,
  primary key("id")
);
CREATE INDEX "sessions_user_id_index" on "sessions"("user_id");
CREATE INDEX "sessions_last_activity_index" on "sessions"("last_activity");
CREATE TABLE IF NOT EXISTS "cache"(
  "key" varchar not null,
  "value" text not null,
  "expiration" integer not null,
  primary key("key")
);
CREATE TABLE IF NOT EXISTS "cache_locks"(
  "key" varchar not null,
  "owner" varchar not null,
  "expiration" integer not null,
  primary key("key")
);
CREATE TABLE IF NOT EXISTS "jobs"(
  "id" integer primary key autoincrement not null,
  "queue" varchar not null,
  "payload" text not null,
  "attempts" integer not null,
  "reserved_at" integer,
  "available_at" integer not null,
  "created_at" integer not null
);
CREATE INDEX "jobs_queue_index" on "jobs"("queue");
CREATE TABLE IF NOT EXISTS "job_batches"(
  "id" varchar not null,
  "name" varchar not null,
  "total_jobs" integer not null,
  "pending_jobs" integer not null,
  "failed_jobs" integer not null,
  "failed_job_ids" text not null,
  "options" text,
  "cancelled_at" integer,
  "created_at" integer not null,
  "finished_at" integer,
  primary key("id")
);
CREATE TABLE IF NOT EXISTS "failed_jobs"(
  "id" integer primary key autoincrement not null,
  "uuid" varchar not null,
  "connection" text not null,
  "queue" text not null,
  "payload" text not null,
  "exception" text not null,
  "failed_at" datetime not null default CURRENT_TIMESTAMP
);
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs"("uuid");
CREATE TABLE IF NOT EXISTS "posts"(
  "id" integer primary key autoincrement not null,
  "created_at" datetime,
  "updated_at" datetime,
  "nama" varchar not null,
  "email" varchar not null,
  "alamat" varchar not null,
  "no_telepon" varchar not null,
  "kategori" varchar check("kategori" in('dewasa', 'anak-anak')) not null,
  "biaya_administrasi" integer not null default '25000'
);
CREATE TABLE IF NOT EXISTS "profils"(
  "id" integer primary key autoincrement not null,
  "created_at" datetime,
  "updated_at" datetime,
  "nama_sanggar" varchar not null,
  "alamat" varchar not null,
  "latar_belakang" text not null,
  "kegiatan" text not null,
  "prestasi" text not null
);
CREATE TABLE IF NOT EXISTS "akuns"(
  "id" integer primary key autoincrement not null,
  "tanggal" date not null,
  "waktu" time not null,
  "jenis_tari" varchar not null,
  "pelatih" varchar not null,
  "anggota" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "barangs"(
  "id_Barang" integer primary key autoincrement not null,
  "nama" varchar not null,
  "kategori" varchar not null,
  "warna" varchar not null,
  "harga_sewa" numeric not null,
  "jenis" varchar not null,
  "stok" integer not null,
  "aksesoris" integer not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "pelanggans"(
  "id_pelanggan" integer primary key autoincrement not null,
  "nama" varchar not null,
  "nomor_telpon" varchar not null,
  "alamat" varchar not null,
  "email" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "penyewaans"(
  "id" integer primary key autoincrement not null,
  "nama_penyewa" varchar not null,
  "durasi_sewa" integer not null,
  "tanggal_peminjaman" date not null,
  "tanggal_pengembalian" date not null,
  "biaya" numeric not null,
  "status" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "admins"(
  "Id_Admin" integer primary key autoincrement not null,
  "nama" varchar not null,
  "email" varchar not null,
  "password" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "admins_email_unique" on "admins"("email");
CREATE TABLE IF NOT EXISTS "transaksis"(
  "id" integer primary key autoincrement not null,
  "Id_Transaksi" integer not null,
  "tanggal_transaksi" date not null,
  "total_harga" numeric not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("Id_Transaksi") references "transaksis"("id") on delete cascade
);

INSERT INTO migrations VALUES(13,'0001_01_01_000000_create_users_table',1);
INSERT INTO migrations VALUES(14,'0001_01_01_000001_create_cache_table',1);
INSERT INTO migrations VALUES(15,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO migrations VALUES(16,'2024_10_04_133101_create_posts_table',1);
INSERT INTO migrations VALUES(18,'2024_10_15_063846_create_profils_table',2);
INSERT INTO migrations VALUES(19,'2024_10_20_032648_create_akuns_table',3);
INSERT INTO migrations VALUES(25,'2024_10_21_063447_create_barangs_table',4);
INSERT INTO migrations VALUES(26,'2024_10_21_075746_create_pelanggans_table',4);
INSERT INTO migrations VALUES(27,'2024_10_21_081026_create_penyewaans_table',4);
INSERT INTO migrations VALUES(28,'2024_10_21_081630_create_admins_table',4);
INSERT INTO migrations VALUES(29,'2024_10_21_082219_create_transaksis_table',4);
