-- public.app_user definition

-- Drop table

-- DROP TABLE app_user;

CREATE TABLE app_user (
	id_user serial4 NOT NULL,
	username varchar(50) NOT NULL,
	"password" bpchar(60) NOT NULL,
	nama varchar(100) NOT NULL,
	no_hp varchar(12) NOT NULL,
	alamat text NOT NULL,
	"role" varchar(30) NOT NULL,
	diperbarui varchar(100) DEFAULT NULL::character varying NULL,
	created_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	CONSTRAINT app_user_pkey PRIMARY KEY (id_user),
	CONSTRAINT app_user_username_key UNIQUE (username)
);


-- public.pasien definition

-- Drop table

-- DROP TABLE pasien;

CREATE TABLE pasien (
	created_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	created_by varchar(50) DEFAULT NULL::character varying NULL,
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	updated_by varchar(50) DEFAULT NULL::character varying NULL,
	deleted_at timestamp NULL,
	deleted_by varchar(50) DEFAULT NULL::character varying NULL,
	deleted_st int2 DEFAULT 0 NULL,
	active_st int2 DEFAULT 1 NULL,
	id_pasien serial4 NOT NULL,
	nomor_rekam_medis varchar(50) NOT NULL,
	nik varchar(20) NOT NULL,
	nama varchar(150) NOT NULL,
	nomor_telpon varchar(20) NOT NULL,
	jenis_kelamin varchar(20) NOT NULL,
	jenis_pasien varchar(50) NULL,
	alamat text NOT NULL,
	tanggal_lahir date NOT NULL,
	CONSTRAINT pasien_nik_key UNIQUE (nik),
	CONSTRAINT pasien_nomor_rekam_medis_key UNIQUE (nomor_rekam_medis),
	CONSTRAINT pasien_pkey PRIMARY KEY (id_pasien)
);


-- public.poliklinik definition

-- Drop table

-- DROP TABLE poliklinik;

CREATE TABLE poliklinik (
	created_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	created_by varchar(50) DEFAULT NULL::character varying NULL,
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	updated_by varchar(50) DEFAULT NULL::character varying NULL,
	deleted_at timestamp NULL,
	deleted_by varchar(50) DEFAULT NULL::character varying NULL,
	deleted_st int2 DEFAULT 0 NULL,
	active_st int2 DEFAULT 1 NULL,
	id_poliklinik serial4 NOT NULL,
	nama_poliklinik varchar(100) NOT NULL,
	CONSTRAINT poliklinik_pkey PRIMARY KEY (id_poliklinik)
);


-- public.dokter definition

-- Drop table

-- DROP TABLE dokter;

CREATE TABLE dokter (
	created_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	created_by varchar(50) DEFAULT NULL::character varying NULL,
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	updated_by varchar(50) DEFAULT NULL::character varying NULL,
	deleted_at timestamp NULL,
	deleted_by varchar(50) DEFAULT NULL::character varying NULL,
	deleted_st int2 DEFAULT 0 NULL,
	active_st int2 DEFAULT 1 NULL,
	id_dokter serial4 NOT NULL,
	id_poliklinik int4 NOT NULL,
	nama varchar(150) NOT NULL,
	CONSTRAINT dokter_pkey PRIMARY KEY (id_dokter),
	CONSTRAINT fk_dokter_poliklinik FOREIGN KEY (id_poliklinik) REFERENCES poliklinik(id_poliklinik) ON DELETE CASCADE
);


-- public.pendaftaran definition

-- Drop table

-- DROP TABLE pendaftaran;

CREATE TABLE pendaftaran (
	created_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	created_by varchar(50) DEFAULT NULL::character varying NULL,
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	updated_by varchar(50) DEFAULT NULL::character varying NULL,
	deleted_at timestamp NULL,
	deleted_by varchar(50) DEFAULT NULL::character varying NULL,
	deleted_st int2 DEFAULT 0 NULL,
	active_st int2 DEFAULT 1 NULL,
	id_pendaftaran serial4 NOT NULL,
	id_pasien int4 NOT NULL,
	id_poliklinik int4 NOT NULL,
	id_dokter int4 NOT NULL,
	tanggal_pendaftaran timestamp NOT NULL,
	CONSTRAINT pendaftaran_pkey PRIMARY KEY (id_pendaftaran),
	CONSTRAINT fk_pendaftaran_dokter FOREIGN KEY (id_dokter) REFERENCES dokter(id_dokter) ON DELETE CASCADE,
	CONSTRAINT fk_pendaftaran_pasien FOREIGN KEY (id_pasien) REFERENCES pasien(id_pasien) ON DELETE CASCADE,
	CONSTRAINT fk_pendaftaran_poliklinik FOREIGN KEY (id_poliklinik) REFERENCES poliklinik(id_poliklinik) ON DELETE CASCADE
);


-- public.pemeriksaan definition

-- Drop table

-- DROP TABLE pemeriksaan;

CREATE TABLE pemeriksaan (
	created_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	created_by varchar(50) DEFAULT NULL::character varying NULL,
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP NULL,
	updated_by varchar(50) DEFAULT NULL::character varying NULL,
	deleted_at timestamp NULL,
	deleted_by varchar(50) DEFAULT NULL::character varying NULL,
	deleted_st int2 DEFAULT 0 NULL,
	active_st int2 DEFAULT 1 NULL,
	id_pemeriksaan serial4 NOT NULL,
	id_pendaftaran int4 NOT NULL,
	status int2 DEFAULT 2 NOT NULL,
	CONSTRAINT pemeriksaan_pkey PRIMARY KEY (id_pemeriksaan),
	CONSTRAINT fk_pemeriksaan_pendaftaran FOREIGN KEY (id_pendaftaran) REFERENCES pendaftaran(id_pendaftaran) ON DELETE CASCADE
);