$(document).ready(function () {
    var no = 1;
  
    // Fungsi untuk menambahkan obat ke dalam tabel resep
    function tambahObat() {
    var obat = $('#obat').val();
    var qty = $('#qty').val();
    var satuan = $('#satuan').val();
    var aturan = $('#aturan').val();

    if (obat && qty && satuan && aturan) {
        $('#resepobat .none').remove();
        var rowbaru = '<tr class="perobat" data-obat="' + obat + '" data-qty="' + qty + '" data-satuan="' + satuan + '" data-aturan="' + aturan +'">' +
            '<td>' + no + '</td>' +
            '<td class="obat">' + obat + '</td>' +
            '<td class="qty">' + qty + '</td>' +
            '<td class="satuan">' + satuan + '</td>' +
            '<td class="aturan">' + aturan + '</td>' +
            '<td align="right">' +
            '<button class="btn btn-info btn-xs update" >' + '<i class="fa fa-pencil"> Ubah</i>' + '</button> ' +
            '<button class="btn btn-danger btn-xs delete">' + '<i class="fa fa-trash"> Hapus</i>' + '</button>' +
            '</td>' +
            '</tr>';

        $('#resepobat').append(rowbaru);
        no++;
    } else {
        alert('Obat belum dipilih ');
    }

    // Bersihkan input setelah menambahkan obat
    $('#obat').val('');
    $('#qty').val('');
    $('#satuan').val('');
    $('#aturan').val('');
    }
    // Mengakses elemen dengan ID yang dibuat secara dinamis
    // var element = document.getElementById("tambahobat<?=$p['id_pemeriksaan']?>");

    // // Sekarang Anda dapat melakukan operasi apa pun pada elemen tersebut
    // element.addEventListener("click", function(event) {
    //     event.preventDefault();
    //     tambahObat();
    // });
    // Event listener untuk tombol tambah obat
    $('#tambahobat').click(function (event) {
    event.preventDefault();
    tambahObat();
    });

    // Event listener untuk tombol update obat
    $(document).on('click', '.update', function (event) {
    event.preventDefault();
    var row = $(this).closest('tr');
    var obat = row.find('.obat').text();
    var qty = row.find('.qty').text();
    var satuan = row.find('.satuan').text();
    var aturan = row.find('.aturan').text();


    $('#update_obat').val(obat);
    $('#update_qty').val(qty);
    $('#update_satuan').val(satuan);
    $('#update_aturan').val(aturan);

    $('#modal-update').modal('show');

    $('#updateobat').off('click').on('click',function(event){
        event.preventDefault();
        var obatbaru = $('#update_obat').val();
        var qtybaru = $('#update_qty').val();
        var satuanbaru = $('#update_satuan').val();
        var aturanbaru = $('#update_aturan').val();

        if (obatbaru && qtybaru && satuanbaru && aturanbaru) {
            
            row.find('.obat').text(obatbaru);
            row.find('.qty').text(qtybaru);
            row.find('.satuan').text(satuanbaru);
            row.find('.aturan').text(aturanbaru);
            console.log('Aturan: ' + row.find('.obat').text());
            
            $('#modal-update').modal('hide');
        } else {
            alert('Harap isi semua field.');
        }
    })
    });

    $(document).on('click','.delete', function(event){
    event.preventDefault();
    var row = $(this).closest('tr');
    row.remove();

    //Jika tidak ada resep obat , tambahkan kemabli baris "Tidak ada Obat"

    if($('#resepobat .none'). length === 0){
        $('#resepobat').append('<tr class="none"><td colspan="6" class="text-center">Tidak ada Obat</td></tr>');
    }
    });
});