<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_users extends CI_Model {

	public function get_provinsi(){
        $hasil = $this->db->query("SELECT * FROM db_provinsi");
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else{
            return array();
        }
    }

    public function get_kota($param){
        $hasil = $this->db->query("SELECT * FROM db_kota WHERE id_provinsi = '$param'");
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else{
            return "Error";
        }
    }

    public function get_cakupan_ori($ori,$provinsi,$kota){
        if($ori == 0){
            $query = "SELECT id_cakupan,`provinsi`, `kota`, `kecamatan`, `desa`, sum(`proyeksi`) as proyeksi, sum(`riil`) as riil, sum(`cakupan`) as cakupan, `tahun` FROM `db_cakupan` a, `db_provinsi` b, `db_kota` c WHERE a.ori IN (1,2,3) AND a.provinsi = b.nama_provinsi AND a.kota = c.nama_kota and b.id_provinsi=1 and a.tahun=2018";
            
            if($provinsi != null){
                $query = $query ." and b.id_provinsi=$provinsi";
            }

            if($kota != null){
                $query = $query ." and c.id_kota=$kota";
            }

            $query = $query . ' group by a.provinsi,a.kota,a.tahun ORDER BY id_cakupan ASC'; 
        } else {
            $query = "SELECT a.* FROM `db_cakupan` a, `db_provinsi` b, `db_kota` c WHERE a.ori = $ori AND a.provinsi = b.nama_provinsi AND a.kota = c.nama_kota and a.tahun=2018";

            if($provinsi != null){
                $query = $query ." and b.id_provinsi=$provinsi";
            }

            if($kota != null){
                $query = $query ." and c.id_kota=$kota";
            }
        }
        $hasil = $this->db->query($query);
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else{
            return "Error";
        }
    }

    public function get_penderita_difteri($tahun,$bulan,$provinsi,$kota){
        $query = "SELECT COALESCE(COUNT(*),'') as Jumlah_Penderita FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa WHERE YEAR(tanggal_lapor) = $tahun AND MONTH(tanggal_lapor) = $bulan";

        if($provinsi != null){
            $query = $query ." and b.id_provinsi=$provinsi";
        }

        if($kota != null){
            $query = $query ." and c.id_kota=$kota";
        }

        $query = $query . " GROUP BY Month(tanggal_lapor),YEAR(tanggal_lapor)";

            /*if($kec != null){
                $query = $query ." and d.id_kecamatan=$kec";
            }

            if($desa != null){
                $query = $query ." and e.id_desa=$desa";
            }*/
            $hasil = $this->db->query($query);
            if($hasil->num_rows() > 0){
                return $hasil->result();
            } else{
                return false;
            }
        }

        public function getKota($provinsi,$kota){
            $query = "SELECT * FROM db_kota WHERE id_provinsi = $provinsi";

            if($kota != null){
                $query = $query ." and id_kota=$kota";
            }

            $hasil = $this->db->query($query);

            if($hasil->num_rows() > 0){
                return $hasil->result();
            } else{
                return "Error";
            }
        }

        public function get_penderita_difteri_by_terima_ads($provinsi,$kota){
            $query = "SELECT";
            if($kota != null){
                $query = $query ." a.kota,";
            }

            $query = $query . " (CASE WHEN terima_ADS = 1 THEN 'Terima ADS' ELSE 'Tidak Terima ADS' END) as Status, MONTH(tanggal_lapor) as Bulan, count(terima_ADS) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where  month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL ";

            if($provinsi != null){
                $query = $query ." and b.id_provinsi=$provinsi";
            }

            if($kota != null){
                $query = $query ." and c.id_kota=$kota";
            }

            $query = $query . " GROUP BY a.terima_ADS,month(a.tanggal_lapor)";

            $hasil = $this->db->query($query);

            if($hasil->num_rows() > 0){
                return $hasil->result();
            } else{
                return false;
            }
        }


        public function get_penderita_difteri_by_terima_ads_status_imun($provinsi,$kota,$status){
            $query = "SELECT";
            if($kota != null){
                $query = $query ." a.kota,";
            }

            $query = $query . " month(tanggal_lapor) as Bulan,(CASE WHEN a.status_imun_pernah = 1 THEN 'Pernah Imunisasi' ELSE 'Tidak Pernah Imunisasi' END) as Status,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where terima_ADS = $status AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL ";

            if($provinsi != null){
                $query = $query ." and b.id_provinsi=$provinsi";
            }

            if($kota != null){
                $query = $query ." and c.id_kota=$kota";
            }

            $query = $query . " GROUP BY a.status_imun_pernah,month(a.tanggal_lapor)";

            $hasil = $this->db->query($query);

            if($hasil->num_rows() > 0){
                return $hasil->result();
            } else{
                return false;
            }
        }

        public function get_penderita_difteri_by_umur($provinsi,$kota,$nomor){
            if($nomor == 10){
                $query = "SELECT";
                if($kota != null){
                    $query = $query ." a.kota,";
                }

                $query = $query . " 'Kurang dari 19 Tahun' as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur <= 19 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND a.umur IS NOT NULL ";

                if($provinsi != null){
                    $query = $query ." and b.id_provinsi=$provinsi";
                }

                if($kota != null){
                    $query = $query ." and c.id_kota=$kota";
                }

                $query = $query . " GROUP BY month(a.tanggal_lapor)";

                $query1 = "SELECT";
                if($kota != null){
                    $query1 = $query1 ." a.kota,";
                }

                $query1 = $query1 . " 'Lebih dari 19 Tahun' as Status, month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur > 19 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND a.umur IS NOT NULL ";

                if($provinsi != null){
                    $query1 = $query1 ." and b.id_provinsi=$provinsi";
                }

                if($kota != null){
                    $query1 = $query1 ." and c.id_kota=$kota";
                }

                $query1 = $query1 . " GROUP BY month(a.tanggal_lapor)";
                $string = $query.' UNION '.$query1;
                $hasil = $this->db->query($string);

                if($hasil->num_rows() > 0){
                    return $hasil->result();
                } else{
                    return false;
                }
            } else if($nomor == 11){
                $query = "SELECT";
                if($kota != null){
                    $query = $query ." a.kota,";
                }

                $query = $query . " 'Kurang dari 19 Tahun' as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur <= 19 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND a.umur IS NOT NULL ";

                if($provinsi != null){
                    $query = $query ." and b.id_provinsi=$provinsi";
                }

                if($kota != null){
                    $query = $query ." and c.id_kota=$kota";
                }

                $query = $query . " GROUP BY month(a.tanggal_lapor)";

                $query1 = "SELECT";
                if($kota != null){
                    $query1 = $query1 ." a.kota,";
                }

                $query1 = $query1 . " 'Lebih dari 19 Tahun' as Status, month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur > 19 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND a.umur IS NOT NULL ";

                if($provinsi != null){
                    $query1 = $query1 ." and b.id_provinsi=$provinsi";
                }

                if($kota != null){
                    $query1 = $query1 ." and c.id_kota=$kota";
                }

                $query1 = $query1 . " GROUP BY month(a.tanggal_lapor)";
                $string = $query.' UNION '.$query1;
                $hasil = $this->db->query($string);

                if($hasil->num_rows() > 0){
                    return $hasil->result();
                } else{
                    return false;
                }
            } else if($nomor == 12){
                $query = "SELECT";
                if($kota != null){
                    $query = $query ." a.kota,";
                }

                $query = $query . " 'Kurang dari 19 tahun' as Umur,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur <= 19 AND a.rekom_ads = 0 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND a.umur IS NOT NULL ";

                if($provinsi != null){
                    $query = $query ." and b.id_provinsi=$provinsi";
                }

                if($kota != null){
                    $query = $query ." and c.id_kota=$kota";
                }

                $query1 = "SELECT";
                if($kota != null){
                    $query1 = $query1 ." a.kota,";
                }

                $query1 = $query1 . " 'Lebih dari 19 tahun' as Umur,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur > 19 AND a.rekom_ads = 0 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND a.umur IS NOT NULL ";

                if($provinsi != null){
                    $query1 = $query1 ." and b.id_provinsi=$provinsi";
                }

                if($kota != null){
                    $query1 = $query1 ." and c.id_kota=$kota";
                } 
                $string = $query.' UNION '.$query1;
                $hasil = $this->db->query($string);

                if($hasil->num_rows() > 0){
                    return $hasil->result();
                } else{
                    return false;
                }
            } else if($nomor == 13) {
                $query = "SELECT";
                if($kota != null){
                    $query = $query ." a.kota,";
                }

                $query = $query . " 'Kurang dari 19 Tahun' as Penderita,(CASE WHEN a.status_imun_pernah = 1 THEN 'Pernah Imunisasi' ELSE 'Tidak Pernah Imunisasi' END) as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur <= 19 AND a.terima_ads = 1 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL and a.Umur IS NOT NULL ";

                if($provinsi != null){
                    $query = $query ." and b.id_provinsi=$provinsi";
                }

                if($kota != null){
                    $query = $query ." and c.id_kota=$kota";
                }

                $query = $query . " GROUP BY month(a.tanggal_lapor),a.status_imun_pernah";

                $query1 = "SELECT";
                if($kota != null){
                    $query1 = $query1 ." a.kota,";
                }

                $query1 = $query1 . " 'Lebih dari 19 Tahun' as Penderita,(CASE WHEN a.status_imun_pernah = 1 THEN 'Pernah Imunisasi' ELSE 'Tidak Pernah Imunisasi' END) as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur > 19 AND a.terima_ads = 1 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL and a.Umur IS NOT NULL ";

                if($provinsi != null){
                    $query1 = $query1 ." and b.id_provinsi=$provinsi";
                }

                if($kota != null){
                    $query1 = $query1 ." and c.id_kota=$kota";
                }

                $query1 = $query1 . " GROUP BY month(a.tanggal_lapor),a.status_imun_pernah";
                $string = $query.' UNION '.$query1;
                $hasil = $this->db->query($string);

                if($hasil->num_rows() > 0){
                    return $hasil->result();
                } else{
                    return false;
                }
            } else if ($nomor == 14){
                $query = "SELECT";
                if($kota != null){
                    $query = $query ." a.kota,";
                }

                $query = $query . " 'Kurang dari 19 Tahun' as Penderita,(CASE WHEN a.status_imun_pernah = 1 THEN 'Pernah Imunisasi' ELSE 'Tidak Pernah Imunisasi' END) as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur <= 19 AND a.terima_ads = 0 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL and a.Umur IS NOT NULL ";

                if($provinsi != null){
                    $query = $query ." and b.id_provinsi=$provinsi";
                }

                if($kota != null){
                    $query = $query ." and c.id_kota=$kota";
                }

                $query = $query . " GROUP BY month(a.tanggal_lapor),a.status_imun_pernah";

                $query1 = "SELECT";
                if($kota != null){
                    $query1 = $query1 ." a.kota,";
                }

                $query1 = $query1 . " 'Lebih dari 19 Tahun' as Penderita,(CASE WHEN a.status_imun_pernah = 1 THEN 'Pernah Imunisasi' ELSE 'Tidak Pernah Imunisasi' END) as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur > 19 AND a.terima_ads = 0 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL and a.Umur IS NOT NULL ";

                if($provinsi != null){
                    $query1 = $query1 ." and b.id_provinsi=$provinsi";
                }

                if($kota != null){
                    $query1 = $query1 ." and c.id_kota=$kota";
                }

                $query1 = $query1 . " GROUP BY month(a.tanggal_lapor),a.status_imun_pernah";
                $string = $query.' UNION '.$query1;
                $hasil = $this->db->query($string);

                if($hasil->num_rows() > 0){
                    return $hasil->result();
                } else{
                    return false;
                }
            }
        }

        /*public function get_penderita($provinsi,$kota){
            $query10 = 'SELECT "Kurang dari 19 Tahun" as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur <= 19 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND a.umur IS NOT NULL GROUP BY month(a.tanggal_lapor) UNION SELECT "Lebih dari 19 Tahun" as Status, month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur > 19 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND a.umur IS NOT NULL GROUP BY month(a.tanggal_lapor)';

            $query11 = 'SELECT "Kurang dari 19 Tahun" as Status,(CASE WHEN terima_ADS = 1 THEN 'Terima ADS' ELSE 'Tidak Terima ADS' END) as Terima_ADS,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur <= 19 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND umur IS NOT NULL GROUP BY a.terima_ads,month(a.tanggal_lapor) UNION SELECT "Lebih dari 19 Tahun" as Status,(CASE WHEN terima_ADS = 1 THEN 'Terima ADS' ELSE 'Tidak Terima ADS' END) as Terima_ADS,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur > 19 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND umur IS NOT NULL GROUP BY a.terima_ads,month(a.tanggal_lapor)';

            $query12 = 'SELECT 'Kurang dari 19 tahun' as Umur,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur <= 19 AND a.rekom_ads = 0 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND a.umur IS NOT NULL UNION SELECT 'Lebih dari 19 tahun' as Umur,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur > 19 AND a.rekom_ads = 0 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL AND a.umur IS NOT NULL';

            $query13 = 'SELECT "Kurang dari 19 Tahun" as Penderita,(CASE WHEN a.status_imun_pernah = 1 THEN 'Pernah Imunisasi' ELSE 'Tidak Pernah Imunisasi' END) as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur <= 19 AND a.terima_ads = 1 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL and a.Umur IS NOT NULL GROUP BY month(a.tanggal_lapor),a.status_imun_pernah UNION SELECT "Lebih dari 19 Tahun" as Penderita,(CASE WHEN a.status_imun_pernah = 1 THEN 'Pernah Imunisasi' ELSE 'Tidak Pernah Imunisasi' END) as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur > 19 AND a.terima_ads = 1 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL and a.Umur IS NOT NULL GROUP BY month(a.tanggal_lapor),a.status_imun_pernah';

            $query14 = 'SELECT "Kurang dari 19 Tahun" as Penderita,(CASE WHEN a.status_imun_pernah = 1 THEN 'Pernah Imunisasi' ELSE 'Tidak Pernah Imunisasi' END) as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur <= 19 AND a.terima_ads = 0 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL and a.Umur IS NOT NULL GROUP BY month(a.tanggal_lapor),a.status_imun_pernah UNION SELECT "Lebih dari 19 Tahun" as Penderita,(CASE WHEN a.status_imun_pernah = 1 THEN 'Pernah Imunisasi' ELSE 'Tidak Pernah Imunisasi' END) as Status,month(tanggal_lapor) as Bulan,COUNT(*) as Jumlah FROM `db_penderita_2018` a LEFT JOIN `db_provinsi` b ON a.provinsi = b.nama_provinsi LEFT JOIN db_kota c ON a.kota = c.nama_kota LEFT JOIN db_kecamatan d ON a.kecamatan = d.nama_kecamatan LEFT JOIN db_desa e ON a.desa = e.nama_desa where a.umur > 19 AND a.terima_ads = 0 AND month(a.tanggal_lapor) IS NOT NULL AND a.kota IS NOT NULL and a.Umur IS NOT NULL GROUP BY month(a.tanggal_lapor),a.status_imun_pernah';
        }*/
    }