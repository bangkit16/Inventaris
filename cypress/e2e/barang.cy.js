describe('Test Case Barang', () => {
    const baseUrl = 'http://127.0.0.1:8000/';
    
    beforeEach(() => {
        cy.visit(`${baseUrl}login`);
        cy.get('input[name="username"]').type('jdabukke');
        cy.get('input[name="password"]').type('12345');
        cy.get('button[type="submit"]').click();
        cy.visit(`${baseUrl}barang`);
    });

    it('Test Case 1: Menampilkan data barang', () => {
      cy.get('table').should('be.visible');
  });

  it('Test Case 2: Menampilkan detail barang', () => {
      cy.get('table tbody tr:first-child .btn-info').click();
      cy.url().should('include', '/barang/');
    });

  it('Test Case 3: Menambahkan data barang', () => {
      cy.contains('Tambah Data').click();
      cy.url().should('include', '/barang/create');

      // Isi form dengan data baru
      cy.get('input[name="nama_barang"]').type('brg br 1');
      cy.get('input[name="harga"]').type('10000');
      cy.get('input[name="stok"]').type('50');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil ditambahkan
      cy.get('.swal2-title').should('have.text', 'Data barang berhasil disimpan');
      // cy.contains('Data barang berhasil disimpan').should('be.visible');
    });
    
    it('Test Case 4: Menambahkan data barang nama barang tidak valid, harga valid, stok valid', () => {
        cy.contains('Tambah Data').click();
        cy.url().should('include', '/barang/create');
        
        // Isi form dengan data baru
        // cy.get('input[name="nama_barang"]').type('Gelas');
        cy.get('input[name="harga"]').type('10000');
        cy.get('input[name="stok"]').type('50');
        
      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil ditambahkan
    //   cy.get('.swal2-title').should('have.text', 'The nama barang field is required.');
      cy.get('.swal2-error').should('be.visible');
      // cy.contains('Data barang berhasil disimpan').should('be.visible');
  });
  it('Test Case 5: Menambahkan data barang nama barang valid, harga tidak valid, stok valid', () => {
      cy.contains('Tambah Data').click();
      cy.url().should('include', '/barang/create');

      // Isi form dengan data baru
      cy.get('input[name="nama_barang"]').type('Gelas Kaca');
      cy.get('input[name="harga"]').type('asd');
      cy.get('input[name="stok"]').type('50');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil ditambahkan
    //   cy.get('.swal2-title').should('have.text', 'The harga field must be a number.');
      cy.get('.swal2-error').should('be.visible');
      // cy.contains('Data barang berhasil disimpan').should('be.visible');
  });
  it('Test Case 6: Menambahkan data barang nama barang valid, harga valid, stok tidak valid', () => {
      cy.contains('Tambah Data').click();
      cy.url().should('include', '/barang/create');

      // Isi form dengan data baru
      cy.get('input[name="nama_barang"]').type('Gelas Kacaa');
      cy.get('input[name="harga"]').type('10000');
      cy.get('input[name="stok"]').type('asd');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil ditambahkan
    //   cy.get('.swal2-title').should('have.text', 'The stok field must be a number.');
      cy.get('.swal2-error').should('be.visible');
      // cy.contains('Data barang berhasil disimpan').should('be.visible');
  });
  it('Test Case 7: Menambahkan data barang nama barang tidak valid, harga tidak valid, stok tidak valid', () => {
      cy.contains('Tambah Data').click();
      cy.url().should('include', '/barang/create');

      // Isi form dengan data baru
      cy.get('input[name="nama_barang"]').type('123');
      cy.get('input[name="harga"]').type('sad');
      cy.get('input[name="stok"]').type('asd');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil ditambahkan
    //   cy.get('.swal2-title').should('have.text', 'The stok field must be a number.');
      cy.get('.swal2-error').should('be.visible');
      // cy.contains('Data barang berhasil disimpan').should('be.visible');
  });
  
  it('Test Case 8: Mengedit data barang', () => {
      // Klik tombol edit pada data barang pertama
      cy.get('table tbody tr:first-child .btn-warning').click();
      cy.url().should('include', '/barang/');

      // Ubah data barang
      cy.get('input[name="nama_barang"]').clear().type('Barang Edit');
      cy.get('input[name="harga"]').clear().type('15000');
      cy.get('input[name="stok"]').clear().type('75');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil diubah
      cy.contains('Data berhasil diubah').should('be.visible');
  });
  it('Test Case 9: Mengedit data barang dengan nama barang tidak valid, harga valid, stok valid', () => {
      // Klik tombol edit pada data barang pertama
      cy.get('table tbody tr:first-child .btn-warning').click();
      cy.url().should('include', '/barang/');

      // Ubah data barang
      cy.get('input[name="nama_barang"]').clear();
      cy.get('input[name="harga"]').clear().type('15000');
      cy.get('input[name="stok"]').clear().type('75');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil diubah
      cy.get('.swal2-error').should('be.visible');
  });
  it('Test Case 10: Mengedit data barang dengan nama barang valid, harga tidak valid, stok valid', () => {
      // Klik tombol edit pada data barang pertama
      cy.get('table tbody tr:first-child .btn-warning').click();
      cy.url().should('include', '/barang/');

      // Ubah data barang
      cy.get('input[name="nama_barang"]').clear().type('stik');
      cy.get('input[name="harga"]').clear().type('asd');
      cy.get('input[name="stok"]').clear().type('75');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil diubah
      cy.get('.swal2-error').should('be.visible');
  });
  it('Test Case 11: Mengedit data barang dengan nama barang valid, harga valid, stok tidak valid', () => {
      // Klik tombol edit pada data barang pertama
      cy.get('table tbody tr:first-child .btn-warning').click();
      cy.url().should('include', '/barang/');

      // Ubah data barang
      cy.get('input[name="nama_barang"]').clear().type('stik');
      cy.get('input[name="harga"]').clear().type('1000');
      cy.get('input[name="stok"]').clear().type('asd');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil diubah
      cy.get('.swal2-error').should('be.visible');
  });
  it('Test Case 12: Mengedit data barang dengan nama barang tidak valid, harga tidak valid, stok tidak valid', () => {
      // Klik tombol edit pada data barang pertama
      cy.get('table tbody tr:first-child .btn-warning').click();
      cy.url().should('include', '/barang/');

      // Ubah data barang
      cy.get('input[name="nama_barang"]').clear().type('123');
      cy.get('input[name="harga"]').clear().type('asd');
      cy.get('input[name="stok"]').clear().type('asd');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil diubah
      cy.get('.swal2-error').should('be.visible');
  });
  it('Test Case 13: Menghapus data barang', () => {
    // Simpan jumlah data sebelum penghapusan
        cy.get('select[name="table_barang_length"]').select('25');
        let rowCountBeforeDelete;
        cy.get('table tbody tr').then(($rows) => {
            rowCountBeforeDelete = $rows.length;
        });

        cy.get('#table_barang').find('tbody tr').last().find('.btn-danger').click();
        cy.get('.swal2-confirm').click();
        cy.get('.swal2-title').should('have.text', 'Data barang berhasil dihapus');   

    });

  it('Test Case 14: Search valid', () => {
      // Ketik kata kunci pencarian
      cy.get('input[type="search"]').type('Gergaji');

      // Cek apakah hasil pencarian sesuai
      cy.get('table tbody tr').should('contain', 'Gergaji');
  });

  it('Test Case 15: Search tidak valid', () => {
      // Ketik kata kunci pencarian yang tidak ada
      cy.get('input[type="search"]').type('Tidak Ada Barang');

      // Cek apakah hasil pencarian kosong
      // cy.contains('No data available').should('be.visible');
      cy.get('#table_barang').find('tbody tr').should('have.length', 0);
  });

  it('Test Case 16: Show entries', () => {
      // Ubah jumlah entri yang ditampilkan menjadi 25
      cy.get('select[name="table_barang_length"]').select('25');
      cy.get('#table_barang').find('tbody tr').should('have.length.lte', 25);

      // Cek apakah jumlah entri sesuai
      // cy.get('table tbody tr').should('have.length', 25);
  });

  it('Test Case 17: Previous and Next page', () => {
      // Klik tombol Next
      cy.contains('Next').click();

      // Cek apakah halaman berikutnya tampil
      cy.get('.paginate_button.next.disabled').should('not.exist');

      // Klik tombol Previous
      cy.contains('Previous').click();

      // Cek apakah kembali ke halaman sebelumnya
      cy.get('.paginate_button.previous.disabled').should('not.exist');
  });
});
