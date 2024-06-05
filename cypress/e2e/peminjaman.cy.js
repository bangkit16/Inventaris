describe('Peminjaman System Tests', () => {

  const baseUrl = 'http://127.0.0.1:8000/';

  beforeEach(() => {
    cy.visit(`${baseUrl}login`);
    cy.get('input[name="username"]').type('jdabukke');
    cy.get('input[name="password"]').type('12345');
    cy.get('button[type="submit"]').click();
    cy.visit(`${baseUrl}peminjaman`);
  });

  describe('Perilaku sistem peminjaman', () => {
    it('1. Periksa perilaku sistem saat user memilih menampilkan Riwayat peminjaman', () => {
      cy.url().should('include', '/peminjaman');
      cy.get('h4').should('contain', 'Daftar Barang yang terdaftar dalam sistem');
    });

    it('2. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang valid, mahasiswa valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
      // Cypress test code for this scenario
      cy.contains('Tambah Data').click();
      cy.url().should('include', '/peminjaman/create');
      cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Gergaji');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      cy.get('#tgl_pinjam').type('2023-01-01');
      cy.get('#tgl_tenggat').type('2023-01-10');
      cy.get('#jumlah').type('1');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      cy.get('.swal2-title').should('contain', 'Data peminjaman berhasil disimpan');
    });

    it('3. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang tidak valid, mahasiswa valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
      cy.contains('Tambah Data').click();
      cy.get('select[required]').as('requiredSelect');
      cy.url().should('include', '/peminjaman/create');
      cy.get('h1').should('contain', 'Tambah peminjaman');
      // cy.get('#id_barang').select('Gergaji');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      cy.get('#tgl_pinjam').type('2023-01-01');
      cy.get('#tgl_tenggat').type('2023-01-10');
      cy.get('#jumlah').type('1');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      cy.get('@requiredSelect').should('have.attr', 'required');
      // cy.contains('Kolom ini harus diisi').should('be.visible');
      // cy.get('.swal2-error').should('be.visible');
    });

    it('4. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang valid, mahasiswa tidak valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
      // Cypress test code for this scenario
      cy.contains('Tambah Data').click();
      cy.get('select[required]').as('requiredSelect');
      cy.url().should('include', '/peminjaman/create');
      cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Gergaji');
      // cy.get('#id_mahasiswa').select('Cici Puspita');
      cy.get('#tgl_pinjam').type('2023-01-01');
      cy.get('#tgl_tenggat').type('2023-01-10');
      cy.get('#jumlah').type('1');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      cy.get('@requiredSelect').should('have.attr', 'required');
    });

    it('5. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang valid, mahasiswa valid, tanggal pinjam tidak valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
      // Cypress test code for this scenario
      cy.contains('Tambah Data').click();
      cy.get('select[required]').as('requiredSelect');
      cy.url().should('include', '/peminjaman/create');
      cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Gergaji');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      // cy.get('#tgl_pinjam').type('2023-01-01');
      cy.get('#tgl_tenggat').type('2023-01-10');
      cy.get('#jumlah').type('1');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-error').should('be.visible');
    });

    it('6. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang valid, mahasiswa valid, tanggal pinjam valid, tanggal tenggat tidak valid dan jumlah valid dimasukkan', () => {
      // Cypress test code for this scenario
      // Cypress test code for this scenario
      cy.contains('Tambah Data').click();
      cy.get('select[required]').as('requiredSelect');
      cy.url().should('include', '/peminjaman/create');
      cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Gergaji');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      cy.get('#tgl_pinjam').type('2023-01-01');
      // cy.get('#tgl_tenggat').type('2023-01-10');
      cy.get('#jumlah').type('1');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-error').should('be.visible');
    });

    it('7. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang valid, mahasiswa valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah tidak valid dimasukkan', () => {
      // Cypress test code for this scenario
      cy.contains('Tambah Data').click();
      cy.get('select[required]').as('requiredSelect');
      cy.url().should('include', '/peminjaman/create');
      cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Gergaji');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      cy.get('#tgl_pinjam').type('2023-01-01');
      cy.get('#tgl_tenggat').type('2023-01-10');
      // cy.get('#jumlah').type('asd');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-error').should('be.visible');
    });

    it('8. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang tidak valid, mahasiswa tidak valid, tanggal pinjam tidak valid, tanggal tenggat tidak valid dan jumlah tidak valid dimasukkan', () => {
      // Cypress test code for this scenario
      cy.contains('Tambah Data').click();
      cy.get('select[required]').as('requiredSelect');
      cy.url().should('include', '/peminjaman/create');
      cy.get('h1').should('contain', 'Tambah peminjaman');
      // cy.get('#id_barang').select('Gergaji');
      // cy.get('#id_mahasiswa').select('Cici Puspita');
      // cy.get('#tgl_pinjam').type('2023-01-01');
      // cy.get('#tgl_tenggat').type('2023-01-10');
      cy.get('#jumlah').type('asd');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      cy.get('@requiredSelect').should('have.attr', 'required');
      // cy.get('.swal2-error').should('be.visible');
    });

    it('9. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, nama user valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
      // Cypress test code for this scenario
      // cy.contains('Tambah Data').click();
      cy.get('#table_peminjaman').find('tbody tr').last().find('.btn-warning').click();
      cy.get('select[required]').as('requiredSelect');
      // cy.url().should('include', '/peminjaman/create');
      // cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Tang');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      cy.get('#id_user').select('Zahra Wijayanti');
      cy.get('#tgl_pinjam').clear().type('2023-02-01');
      cy.get('#tgl_tenggat').clear().type('2023-02-10');
      cy.get('#jumlah').clear().type('3');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-title').should('be.visible');
    });

    it('10. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang tidak valid, nama mahasiswa valid, nama user valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
      // Cypress test code for this scenario
      // cy.contains('Tambah Data').click();
      cy.get('#table_peminjaman').find('tbody tr').last().find('.btn-warning').click();
      cy.get('select[required]').as('requiredSelect');
      // cy.url().should('include', '/peminjaman/create');
      // cy.get('h1').should('contain', 'Tambah peminjaman');
      // cy.get('#id_barang').select('Pisau Kater');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      cy.get('#id_user').select('Zahra Wijayanti');
      cy.get('#tgl_pinjam').clear().type('2023-02-01');
      cy.get('#tgl_tenggat').clear().type('2023-02-10');
      cy.get('#jumlah').clear().type('3');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-title').should('be.visible');
      
    });

    it('11. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa tidak valid, nama user valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
      // Cypress test code for this scenario
      // cy.contains('Tambah Data').click();
      cy.get('#table_peminjaman').find('tbody tr').last().find('.btn-warning').click();
      cy.get('select[required]').as('requiredSelect');
      // cy.url().should('include', '/peminjaman/create');
      // cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Tang');
      // cy.get('#id_mahasiswa').select('Cici Puspita');
      cy.get('#id_user').select('Zahra Wijayanti');
      cy.get('#tgl_pinjam').clear().type('2023-02-01');
      cy.get('#tgl_tenggat').clear().type('2023-02-10');
      cy.get('#jumlah').clear().type('3');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-title').should('be.visible');
    });

    it('12. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, nama user tidak valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
      // Cypress test code for this scenario
      // cy.contains('Tambah Data').click();
      cy.get('#table_peminjaman').find('tbody tr').last().find('.btn-warning').click();
      cy.get('select[required]').as('requiredSelect');
      // cy.url().should('include', '/peminjaman/create');
      // cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Tang');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      // cy.get('#id_user').select('Zahra Wijayanti');
      cy.get('#tgl_pinjam').clear().type('2023-02-01');
      cy.get('#tgl_tenggat').clear().type('2023-02-10');
      cy.get('#jumlah').clear().type('3');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-title').should('be.visible');
    });

    it('13. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, nama user valid, tanggal pinjam tidak valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
      // Cypress test code for this scenario
      // cy.contains('Tambah Data').click();
      cy.get('#table_peminjaman').find('tbody tr').last().find('.btn-warning').click();
      cy.get('select[required]').as('requiredSelect');
      // cy.url().should('include', '/peminjaman/create');
      // cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Tang');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      cy.get('#id_user').select('Zahra Wijayanti');
      cy.get('#tgl_pinjam').clear();
      cy.get('#tgl_tenggat').clear().type('2023-02-10');
      cy.get('#jumlah').clear().type('3');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-title').should('be.visible');
    });

    it('14. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, nama user valid, tanggal pinjam valid, tanggal tenggat tidak valid dan jumlah valid dimasukkan', () => {
      // Cypress test code for this scenario
      // cy.contains('Tambah Data').click();
      cy.get('#table_peminjaman').find('tbody tr').last().find('.btn-warning').click();
      cy.get('select[required]').as('requiredSelect');
      // cy.url().should('include', '/peminjaman/create');
      // cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Tang');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      cy.get('#id_user').select('Zahra Wijayanti');
      cy.get('#tgl_pinjam').clear().type('2023-02-01');
      cy.get('#tgl_tenggat').clear();
      cy.get('#jumlah').clear().type('3');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-title').should('be.visible');
    });

    it('15. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, nama user valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah tidak valid dimasukkan', () => {
      // Cypress test code for this scenario
      // cy.contains('Tambah Data').click();
      cy.get('#table_peminjaman').find('tbody tr').last().find('.btn-warning').click();
      cy.get('select[required]').as('requiredSelect');
      // cy.url().should('include', '/peminjaman/create');
      // cy.get('h1').should('contain', 'Tambah peminjaman');
      cy.get('#id_barang').select('Tang');
      cy.get('#id_mahasiswa').select('Mutia Safitri');
      cy.get('#id_user').select('Zahra Wijayanti');
      cy.get('#tgl_pinjam').clear().type('2023-02-01');
      cy.get('#tgl_tenggat').clear().type('2023-02-10');
      cy.get('#jumlah').clear();
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-title').should('be.visible');
    });

    it('16. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang tidak valid, nama mahasiswa tidak valid, nama user tidak valid, tanggal pinjam tidak valid, tanggal tenggat tidak valid dan jumlah tidak valid dimasukkan', () => {
      // Cypress test code for this scenario
      // cy.contains('Tambah Data').click();
      cy.get('#table_peminjaman').find('tbody tr').last().find('.btn-warning').click();
      cy.get('select[required]').as('requiredSelect');
      // cy.url().should('include', '/peminjaman/create');
      // cy.get('h1').should('contain', 'Tambah peminjaman');
      // cy.get('#id_barang').select('Pisau Kater');
      // cy.get('#id_mahasiswa').select('Cici Puspita');
      // cy.get('#id_user').select('Zahra Wijayanti');
      cy.get('#tgl_pinjam').clear();
      cy.get('#tgl_tenggat').clear();
      cy.get('#jumlah').clear();
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/peminjaman');
      // cy.get('@requiredSelect').should('have.attr', 'required');
      cy.get('.swal2-title').should('be.visible');
    });

    it('17. Periksa perilaku sistem saat user memilih menghapus data transaksi peminjaman', () => {
      // Cypress test code for this scenario
      cy.get('select[name="table_peminjaman_length"]').select('25');
      let rowCountBeforeDelete;
      cy.get('table tbody tr').then(($rows) => {
        rowCountBeforeDelete = $rows.length;
      });

      cy.get('#table_peminjaman').find('tbody tr').find('.btn-danger').last().click();
      cy.get('.swal2-confirm').click();

      cy.get('.swal2-title').should('have.text', 'Data peminjaman berhasil dihapus');
      cy.wait(5000)
    });

    it('18. Periksa perilaku system saat user memilih status dipinjam', () => {
      // Cypress test code for this scenario
      cy.get('select[name="table_peminjaman_length"]').select('25');
      // cy.get('#table_peminjaman').find('tbody tr').last().find('.btn-secondary').click();
      cy.get('#kembaliBarang').submit();
      // cy.contains('Dikembalikan').click();
      cy.get('.swal2-confirm').click();
      cy.get('.swal2-title').should('have.text', 'Barang Dikembalikan');

    });

    it('19. Periksa perilaku system saat user memilih status dikembalikan', () => {
      // Cypress test code for this scenario
      cy.contains('Dikembalikan').click();
      // cy.url().should('include', '/pengembalian');
      // cy.get('.swal2-title').should('have.text', 'Data peminjaman berhasil dihapus'); 
      cy.url().should('include', '/pengembalian');
    });

    it('20. Periksa perilaku system saat search Riwayat transaksi data peminjaman valid', () => {
      // Cypress test code for this scenario
      cy.get('input[type="search"]').type('Benang Plastik');

      // Cek apakah hasil pencarian sesuai
      cy.get('table tbody tr').should('contain', 'Benang Plastik');
    });

    it('21. Periksa perliaku system saat search Riwayat transaksi data peminjaman tidak valid', () => {
      // Cypress test code for this scenario
      cy.get('input[type="search"]').type('Tidak Ada peminjaman');

      // Cek apakah hasil pencarian kosong
      // cy.contains('No data available').should('be.visible');
      cy.get('#table_peminjaman').find('tbody tr').should('have.length', 0);
    });

    it('22. Periksa perilaku system saat filter Riwayat transaksi peminjaman data peminjam', () => {
      // Cypress test code for this scenario
      cy.get('#id_barang').select('Tang');
      cy.get('#table_peminjaman').should('contain', 'Tang');
    });

    it('23. Periksa perilaku system saat show entries', () => {
      // Cypress test code for this scenario
      cy.get('select[name="table_peminjaman_length"]').select('25');
      cy.get('#table_peminjaman').find('tbody tr').should('have.length.lte', 25);
    });

    it('24. Periksa perilaku system saat previous and next page', () => {
      // Cypress test code for this scenario
      cy.get('#table_peminjaman_next').click();
      cy.get('#table_peminjaman_previous').click();
    });
  });


  // it('1. Periksa perilaku sistem saat user memilih menampilkan Riwayat peminjaman', () => {
  //   cy.visit(`${baseUrl}peminjaman`);
  //   cy.url().should('include', '/peminjaman');
  //   cy.get('h4').should('contain', 'Daftar Barang yang terdaftar dalam sistem');
  // });

  // it('2. Periksa perilaku sistem saat user memilih menambah data transaksi peminjaman', () => {
  //   // cy.get('a[href=" ' +baseUrl+'peminjaman/create"]').click();
  //   cy.contains('Tambah Data').click();
  //   cy.url().should('include', '/peminjaman/create');
  //   // cy.get('h4').should('contain', 'Tambah peminjaman baru');
  // });

  // it('3. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang valid, mahasiswa valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a[href="/peminjaman/create"]').click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.swal2-confirm').click();
  //   cy.url().should('include', '/peminjaman');
  //   cy.get('.alert-success').should('contain', 'Data peminjaman berhasil disimpan');
  // });

  // it('4. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang tidak valid, mahasiswa valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a[href="/peminjaman/create"]').click();
  //   cy.get('#id_barang').select('');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The id barang field is required.');
  // });

  // it('5. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang valid, mahasiswa tidak valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a[href="/peminjaman/create"]').click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The id mahasiswa field is required.');
  // });

  // it('6. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang valid, mahasiswa valid, tanggal pinjam tidak valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a[href="/peminjaman/create"]').click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#tgl_pinjam').type('');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The tgl pinjam field is required.');
  // });

  // it('7. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang valid, mahasiswa valid, tanggal pinjam valid, tanggal tenggat tidak valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a[href="/peminjaman/create"]').click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The tgl tenggat field is required.');
  // });

  // it('8. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang valid, mahasiswa valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah tidak valid dimasukkan', () => {
  //   cy.get('a[href="/peminjaman/create"]').click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The jumlah field is required.');
  // });

  // it('10. Periksa perilaku sistem saat user menambah data transaksi peminjaman dengan nama barang tidak valid, mahasiswa tidak valid, tanggal pinjam tidak valid, tanggal tenggat tidak valid dan jumlah tidak valid dimasukkan', () => {
  //   cy.get('a[href="/peminjaman/create"]').click();
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The id barang field is required.')
  //   cy.get('.alert-danger').should('contain', 'The id mahasiswa field is required.')
  //   cy.get('.alert-danger').should('contain', 'The tgl pinjam field is required.')
  //   cy.get('.alert-danger').should('contain', 'The tgl tenggat field is required.')
  //   cy.get('.alert-danger').should('contain', 'The jumlah field is required.');
  // });

  // it('11. Periksa perilaku sistem saat user memilih mengedit data transaksi peminjaman', () => {
  //   cy.get('a.btn-warning').first().click();
  //   cy.url().should('include', '/edit');
  //   cy.get('h4').should('contain', 'Edit peminjaman');
  // });

  // it('12. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, nama user valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a.btn-warning').first().click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#id_user').select('1');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.swal2-confirm').click();
  //   cy.url().should('include', '/peminjaman');
  //   cy.get('.alert-success').should('contain', 'Data berhasil diubah');
  // });

  // it('13. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang tidak valid, nama mahasiswa valid, nama user valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a.btn-warning').first().click();
  //   cy.get('#id_barang').select('');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#id_user').select('1');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The id barang field is required.');
  // });

  // it('14. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa tidak valid, nama user valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a.btn-warning').first().click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('');
  //   cy.get('#id_user').select('1');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The id mahasiswa field is required.');
  // });

  // it('15. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, nama user tidak valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a.btn-warning').first().click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#id_user').select('');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The id user field is required.');
  // });

  // it('16. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, nama user valid, tanggal pinjam tidak valid, tanggal tenggat valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a.btn-warning').first().click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#id_user').select('1');
  //   cy.get('#tgl_pinjam').type('');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The tgl pinjam field is required.');
  // });

  // it('17. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, nama user valid, tanggal pinjam valid, tanggal tenggat tidak valid dan jumlah valid dimasukkan', () => {
  //   cy.get('a.btn-warning').first().click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#id_user').select('1');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('');
  //   cy.get('#jumlah').type('1');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The tgl tenggat field is required.');
  // });

  // it('18. Periksa perilaku sistem saat user mengedit data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, nama user valid, tanggal pinjam valid, tanggal tenggat valid dan jumlah tidak valid dimasukkan', () => {
  //   cy.get('a.btn-warning').first().click();
  //   cy.get('#id_barang').select('1');
  //   cy.get('#id_mahasiswa').select('1');
  //   cy.get('#id_user').select('1');
  //   cy.get('#tgl_pinjam').type('2023-01-01');
  //   cy.get('#tgl_tenggat').type('2023-01-10');
  //   cy.get('#jumlah').type('');
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The jumlah field is required.');
  // });

  // it('19. Periksa perilaku sistem saat user memilih menghapus data transaksi peminjaman', () => {
  //   cy.get('a.btn-danger').first().click();
  //   cy.get('.swal2-confirm').click();
  //   cy.get('.alert-success').should('contain', 'Data berhasil dihapus');
  // });

  // it('20. Periksa perilaku sistem saat user menghapus data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, tanggal pinjam valid, tanggal tenggat valid, dan jumlah valid', () => {
  //   cy.get('a[href="/peminjaman"]').click();
  //   cy.get('a.btn-danger').first().click();
  //   cy.get('.swal2-confirm').click();
  //   cy.get('.alert-success').should('contain', 'Data berhasil dihapus');
  // });

  // it('21. Periksa perilaku sistem saat user menghapus data transaksi peminjaman dengan nama barang tidak valid, nama mahasiswa valid, tanggal pinjam valid, tanggal tenggat valid, dan jumlah valid', () => {
  //   // Assuming a specific entry with invalid barang name (test case might need to be adjusted based on actual data)
  //   cy.get('a[href="/peminjaman"]').click();
  //   cy.contains('Invalid Barang Name').parent().find('a.btn-danger').click();
  //   cy.get('.swal2-confirm').click();
  //   cy.get('.alert-success').should('contain', 'Data berhasil dihapus');
  // });

  // it('22. Periksa perilaku sistem saat user menghapus data transaksi peminjaman dengan nama barang valid, nama mahasiswa tidak valid, tanggal pinjam valid, tanggal tenggat valid, dan jumlah valid', () => {
  //   // Assuming a specific entry with invalid mahasiswa name (test case might need to be adjusted based on actual data)
  //   cy.get('a[href="/peminjaman"]').click();
  //   cy.contains('Invalid Mahasiswa Name').parent().find('a.btn-danger').click();
  //   cy.get('.swal2-confirm').click();
  //   cy.get('.alert-success').should('contain', 'Data berhasil dihapus');
  // });

  // it('23. Periksa perilaku sistem saat user menghapus data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, tanggal pinjam tidak valid, tanggal tenggat valid, dan jumlah valid', () => {
  //   // Assuming a specific entry with invalid pinjam date (test case might need to be adjusted based on actual data)
  //   cy.get('a[href="/peminjaman"]').click();
  //   cy.contains('Invalid Pinjam Date').parent().find('a.btn-danger').click();
  //   cy.get('.swal2-confirm').click();
  //   cy.get('.alert-success').should('contain', 'Data berhasil dihapus');
  // });

  // it('24. Periksa perilaku sistem saat user menghapus data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, tanggal pinjam valid, tanggal tenggat tidak valid, dan jumlah valid', () => {
  //   // Assuming a specific entry with invalid tenggat date (test case might need to be adjusted based on actual data)
  //   cy.get('a[href="/peminjaman"]').click();
  //   cy.contains('Invalid Tenggat Date').parent().find('a.btn-danger').click();
  //   cy.get('.swal2-confirm').click();
  //   cy.get('.alert-success').should('contain', 'Data berhasil dihapus');
  // });

  // it('25. Periksa perilaku sistem saat user menghapus data transaksi peminjaman dengan nama barang valid, nama mahasiswa valid, tanggal pinjam valid, tanggal tenggat valid, dan jumlah tidak valid', () => {
  //   // Assuming a specific entry with invalid jumlah (test case might need to be adjusted based on actual data)
  //   cy.get('a[href="/peminjaman"]').click();
  //   cy.contains('Invalid Jumlah').parent().find('a.btn-danger').click();
  //   cy.get('.swal2-confirm').click();
  //   cy.get('.alert-success').should('contain', 'Data berhasil dihapus');
  // });

  // it('26. Periksa perilaku sistem saat user menghapus data transaksi peminjaman dengan nama barang tidak valid, nama mahasiswa tidak valid, tanggal pinjam tidak valid, tanggal tenggat tidak valid, dan jumlah tidak valid', () => {
  //   // Assuming a specific entry with multiple invalid fields (test case might need to be adjusted based on actual data)
  //   cy.get('a[href="/peminjaman"]').click();
  //   cy.contains('Invalid Data Set').parent().find('a.btn-danger').click();
  //   cy.get('.swal2-confirm').click();
  //   cy.get('.alert-success').should('contain', 'Data berhasil dihapus');
  // });

  // it('27. Periksa perilaku sistem saat user mencoba menambah data transaksi peminjaman dengan semua data kosong', () => {
  //   cy.get('a[href="/peminjaman/create"]').click();
  //   cy.get('button[type="submit"]').click();
  //   cy.get('.alert-danger').should('contain', 'The id barang field is required.')
  //   cy.get('.alert-danger').should('contain', 'The id mahasiswa field is required.')
  //   cy.get('.alert-danger').should('contain', 'The tgl pinjam field is required.')
  //   cy.get('.alert-danger').should('contain', 'The tgl tenggat field is required.')
  //   cy.get('.alert-danger').should('contain', 'The jumlah field is required.');
  // });

});
