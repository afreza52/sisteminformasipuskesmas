<?php
class model extends CI_Model
{
  function norm()
  {
    $sql = "SELECT MAX(MID(nomor_rekam_medis, 3, 4)) AS max_norm FROM pasien";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $max_norm = $row->max_norm;

      if ($max_norm !== null) {
        $n = ((int) $max_norm) + 1;
        $no = sprintf("%'.04d", $n);
      } else {
        $no = "001";
      }
    } else {
      $no = "001";
    }

    $norm = "RM" . $no;
    return $norm;
  }
  function getDokter()
  {
    $query = "SELECT dokter.*,dokter.nama as dokter, poliklinik.nama as poliklinik 
          FROM dokter 
          JOIN poliklinik ON dokter.id_poliklinik = poliklinik.id_poliklinik";
    return $this->db->query($query)->result_array();
  }
  function Dokter()
  {
    $query = "SELECT dokter.*,dokter.nama as dokter";
    return $this->db->query($query)->result_array();
  }
  function pendaftaran()
  {
    $query = "SELECT pendaftaran.*, pasien.*,pasien.nama as pasien,pasien.nomor_rekam_medis as no_rm,poliklinik.nama as poliklinik,dokter.nama as dokter
          FROM pendaftaran 
          JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien
          JOIN poliklinik ON pendaftaran.id_poliklinik = poliklinik.id_poliklinik
          JOIN dokter ON pendaftaran.id_dokter = dokter.id_dokter";
    return $this->db->query($query)->result_array();
  }
  function getRegistrationsByMonth()
  {
    $this->db->select('YEAR(tanggal_pendaftaran) AS tahun, MONTH(tanggal_pendaftaran) AS bulan, COUNT(*) AS jumlah_pendaftaran');
    $this->db->from('pendaftaran');
    $this->db->group_by('YEAR(tanggal_pendaftaran), MONTH(tanggal_pendaftaran)');
    $this->db->order_by('tahun ASC, bulan ASC');

    $query = $this->db->get()->result_array();
    return $query;
  }
  function getPemeriksaan()
  {
    $query = "SELECT pemeriksaan.*,pasien.nama as pasien, dokter.nama as dokter, poliklinik.nama as poliklinik,pendaftaran.id_pendaftaran
                FROM pemeriksaan 
                JOIN pendaftaran ON pemeriksaan.id_pendaftaran = pendaftaran.id_pendaftaran
                JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien
                JOIN dokter ON pendaftaran.id_dokter = dokter.id_dokter
                JOIN poliklinik ON pendaftaran.id_poliklinik = poliklinik.id_poliklinik
               WHERE pemeriksaan.status = 1";
    return $this->db->query($query)->result_array();
  }
  function getPemeriksaanPoli($where)
  {
    $query = "SELECT pemeriksaan.*,pasien.nama as pasien, dokter.nama as dokter, poliklinik.nama as poliklinik,pendaftaran.id_pendaftaran,pendaftaran.tanggal_pendaftaran
                FROM pemeriksaan 
                JOIN pendaftaran ON pemeriksaan.id_pendaftaran = pendaftaran.id_pendaftaran
                JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien
                JOIN dokter ON pendaftaran.id_dokter = dokter.id_dokter
                JOIN poliklinik ON pendaftaran.id_poliklinik = poliklinik.id_poliklinik
               WHERE poliklinik.id_poliklinik = ? ";
    return $this->db->query($query, [$where])->result_array();
  }
  function getPeriksaMedis($where)
  {
    $query = "SELECT pemeriksaan.*,pasien.nama as pasien, dokter.nama as dokter, poliklinik.nama as poliklinik,pendaftaran.id_pendaftaran,pendaftaran.tanggal_pendaftaran
                FROM pemeriksaan 
                JOIN pendaftaran ON pemeriksaan.id_pendaftaran = pendaftaran.id_pendaftaran
                JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien
                JOIN dokter ON pendaftaran.id_dokter = dokter.id_dokter
                JOIN poliklinik ON pendaftaran.id_poliklinik = poliklinik.id_poliklinik
               WHERE pemeriksaan.id_pemeriksaan = ? ";
    return $this->db->query($query, [$where])->result_array();
  }
  function pembayaran($where)
  {
    $query = "SELECT a.*,b.id_pemeriksaan,c.nama as pasien
                FROM pembayaran as a
                JOIN pemeriksaan as b ON a.id_pemeriksaan = b.id_pemeriksaan
                JOIN pendaftaran as d ON b.id_pendaftaran = d.id_pendaftaran
                JOIN pasien as c ON d.id_pasien = c.id_pasien
               WHERE a.status = ? ";
    return $this->db->query($query, [$where])->result_array();
  }


}