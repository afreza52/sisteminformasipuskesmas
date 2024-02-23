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
    $query = "SELECT pendaftaran.*, pasien.*,pasien.nama as pasien,pasien.nomor_rekam_medis as no_rm,poliklinik.nama as poliklinik,dokter.nama as dokter,DATE(pendaftaran.tanggal_pendaftaran) as tanggal_pendaftaran,TIME(pendaftaran.tanggal_pendaftaran) as waktu_pendaftaran
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
    $query = "SELECT a.*,c.nama as pasien, d.nama as dokter, e.nama as poliklinik,f.nama as diagnosa,g.nama as tindakan
                FROM pemeriksaan as a
                JOIN pendaftaran as b ON a.id_pendaftaran = b.id_pendaftaran
                JOIN pasien as c ON b.id_pasien = c.id_pasien
                JOIN dokter as d ON b.id_dokter = d.id_dokter
                JOIN poliklinik as e ON b.id_poliklinik = e.id_poliklinik
                JOIN diagnosa as f ON a.id_diagnosa = f.id_diagnosa
                JOIN tindakan as g ON a.id_tindakan = g.id_tindakan
               WHERE a.status = 1";
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
    $query = "SELECT a.*,b.id_pemeriksaan,c.nama as pasien,c.jenis_pasien
                FROM pembayaran as a
                JOIN pemeriksaan as b ON a.id_pemeriksaan = b.id_pemeriksaan
                JOIN pendaftaran as d ON b.id_pendaftaran = d.id_pendaftaran
                JOIN pasien as c ON d.id_pasien = c.id_pasien
               WHERE a.status = ? ";
    return $this->db->query($query, [$where])->result_array();
  }
  function resep($where)
  {
    $query = "SELECT a.*,b.nama as obat
                FROM resep_obat as a
                JOIN obat as b ON b.id_obat = a.id_obat
               WHERE a.id_pemeriksaan = ?";
    return $this->db->query($query, [$where])->result_array();
  }
  function cetakresep($where)
  {
    $query = "SELECT d.*,b.nama as dokter,a.tanggal_pemeriksaan as tanggal_resep
    FROM pemeriksaan as a
    JOIN pendaftaran as c ON a.id_pendaftaran = c.id_pendaftaran
    JOIN pasien as d ON c.id_pasien = d.id_pasien
    JOIN dokter as b ON c.id_dokter = b.id_dokter
    WHERE a.id_pemeriksaan = ?";
    return $this->db->query($query,[$where])->result_array();
  }
  function pendaftaranfilter($start_date,$end_date,$jenis_pasien)
  {
     
      $where = '';
      if ($start_date && $end_date) {
          $where .= "pendaftaran.tanggal_pendaftaran BETWEEN '$start_date' AND '$end_date' AND ";
      }
      if ($jenis_pasien) {
          $where .= "pasien.jenis_pasien LIKE '%$jenis_pasien%' AND ";
      }
      if (!empty($where)) {
          $where = rtrim($where, 'AND ');
      }

      $query = "SELECT pendaftaran.*, pasien.*, pasien.nama as pasien, pasien.nomor_rekam_medis as no_rm, poliklinik.nama as poliklinik, dokter.nama as dokter, DATE(pendaftaran.tanggal_pendaftaran) as tanggal_pendaftaran, TIME(pendaftaran.tanggal_pendaftaran) as waktu_pendaftaran
        FROM pendaftaran 
        JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien
        JOIN poliklinik ON pendaftaran.id_poliklinik = poliklinik.id_poliklinik
        JOIN dokter ON pendaftaran.id_dokter = dokter.id_dokter";

      if (!empty($where)) {
          $query .= " WHERE $where";
      }

      return $this->db->query($query)->result_array();
      
  }
}