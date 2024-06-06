describe('Periksa fungsi data peminjam', () => {
  const baseUrl = 'http://127.0.0.1:8000/';

  beforeEach(() => {
    cy.visit(`${baseUrl}login`);
    cy.get('input[name="username"]').type('jdabukke');
    cy.get('input[name="password"]').type('12345');
    cy.get('button[type="submit"]').click();
    cy.visit(`${baseUrl}mahasiswa`);
  });

  it('Test Case 1: Menampilkan data peminjam', () => {
    cy.get('table').should('be.visible');
});

  it('Test Case 2: Menampilkan detail peminjam', () => {
      cy.get('table tbody tr:first-child .btn-info').click();
      cy.url().should('include', '/mahasiswa/');
  });

  it('Test Case 3: Menambahkan data peminjam dengan nama mahasiswa valid dan nim valid', () => {
    cy.contains('Tambah Data').click();
    cy.url().should('include', '/mahasiswa/create');

    // Isi form dengan data baru
    cy.get('input[name="nama"]').type('Aldi');
    cy.get('input[name="nim"]').type('12345678');
    // cy.get('input[name="nim"]').should('have.value', '12345678');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil ditambahkan
    cy.get('.swal2-title').should('have.text', 'Data peminjam berhasil disimpan');
    // cy.contains('Data peminjam berhasil disimpan').should('be.visible');
});

it('Test Case 4: Menambahkan data peminjam dengan nama mahasiswa tidak valid dan nim valid', () => {
  cy.contains('Tambah Data').click();
  cy.url().should('include', '/mahasiswa/create');

  // Isi form dengan data baru
  // cy.get('input[name="nama"]').type('Reno');
  cy.get('input[name="nim"]').type('111111111111');
  // cy.get('input[name="nim"]').should('have.value', '12345678');

  // Submit form
  cy.get('form').submit();

  // Cek apakah data berhasil ditambahkan
  cy.get('.swal2-error').should('be.visible');
  // cy.contains('Data peminjam berhasil disimpan').should('be.visible');
});

it('Test Case 5: Menambahkan data peminjam dengan nama mahasiswa valid dan nim tidak valid', () => {
  cy.contains('Tambah Data').click();
  cy.url().should('include', '/mahasiswa/create');

  // Isi form dengan data baru
  cy.get('input[name="nama"]').type('Reno');
  cy.get('input[name="nim"]').type('aaaaaaaaa');
  // cy.get('input[name="nim"]').should('have.value', '12345678');

  // Submit form
  cy.get('form').submit();

  // Cek apakah data berhasil ditambahkan
  cy.get('.swal2-error').should('be.visible');
  // cy.contains('Data peminjam berhasil disimpan').should('be.visible');
});

it('Test Case 6: Menambahkan data peminjam dengan nama mahasiswa tidak valid dan nim tidak valid', () => {
  cy.contains('Tambah Data').click();
  cy.url().should('include', '/mahasiswa/create');

  // Isi form dengan data baru
  // cy.get('input[name="nama"]').type('Reno');
  cy.get('input[name="nim"]').type('bbbbbbb');
  // cy.get('input[name="nim"]').should('have.value', '12345678');

  // Submit form
  cy.get('form').submit();

  // Cek apakah data berhasil ditambahkan
  cy.get('.swal2-error').should('be.visible');
  // cy.contains('Data peminjam berhasil disimpan').should('be.visible');
});


  it('Test Case 7: Mengedit data peminjam dengan nama valid dan nim valid', () => {
  // Klik tombol edit pada data user pertama
  cy.get('table tbody tr:last-child .btn-warning').click();
  cy.url().should('include', '/mahasiswa/');

  // Ubah data user
  cy.get('input[name="nama"]').clear().type('Bangkit');
  cy.get('input[name="nim"]').clear().type('1234325524323');

  // Submit form
  cy.get('form').submit();

  // Cek apakah data berhasil diubah
  cy.get('.swal2-title').should('be.visible');
  // cy.contains('Data berhasil diubah').should('be.visible');
  });

  it('Test Case 8: Mengedit data peminjam dengan nama tidak valid dan nim valid', () => {
    // Klik tombol edit pada data user pertama
    cy.get('table tbody tr:last-child .btn-warning').click();
    cy.url().should('include', '/mahasiswa/');
  
    // Ubah data user
    cy.get('input[name="nama"]').clear();
    cy.get('input[name="nim"]').clear().type('54674842356');
  
    // Submit form
    cy.get('form').submit();
  
    // Cek apakah data berhasil diubah
    cy.get('.swal2-error').should('be.visible');
    // cy.contains('Data berhasil diubah').should('be.visible');
    });

    it('Test Case 9: Mengedit data peminjam dengan nama valid dan nim tidak valid', () => {
      // Klik tombol edit pada data user pertama
      cy.get('table tbody tr:last-child .btn-warning').click();
      cy.url().should('include', '/mahasiswa/');
    
      // Ubah data user
      cy.get('input[name="nama"]').clear().type('Clara');
      cy.get('input[name="nim"]').clear();
    
      // Submit form
      cy.get('form').submit();
    
      // Cek apakah data berhasil diubah
      cy.get('.swal2-error').should('be.visible');
      // cy.contains('Data berhasil diubah').should('be.visible');
      });

      it('Test Case 10: Mengedit data peminjam dengan nama tidak valid dan nim tidak valid', () => {
        // Klik tombol edit pada data user pertama
        cy.get('table tbody tr:last-child .btn-warning').click();
        cy.url().should('include', '/mahasiswa/');
      
        // Ubah data user
        cy.get('input[name="nama"]').clear();
        cy.get('input[name="nim"]').clear();
      
        // Submit form
        cy.get('form').submit();
      
        // Cek apakah data berhasil diubah
        cy.get('.swal2-error').should('be.visible');
        // cy.contains('Data berhasil diubah').should('be.visible');
        });

  it('Test Case 11: Menghapus data peminjam', () => {
    // Simpan jumlah data sebelum penghapusan
    cy.get('select[name="table_mahasiswa_length"]').select('25');
    let rowCountBeforeDelete;
    cy.get('table tbody tr').then(($rows) => {
        rowCountBeforeDelete = $rows.length;
    });

    cy.get('#table_mahasiswa').find('tbody tr').last().find('.btn-danger').click();
    cy.get('.swal2-confirm').click();
    cy.get('.swal2-title').should('have.text', 'Data peminjam berhasil dihapus');   

  });

  it('Test Case 12: Search valid', () => {
    // Ketik kata kunci pencarian
    cy.get('input[type="search"]').type('Jarwi');

    // Cek apakah hasil pencarian sesuai
    cy.get('table tbody tr').should('contain', 'Jarwi');
});

  it('Test Case 13: Search tidak valid', () => {
    // Ketik kata kunci pencarian yang tidak ada
    cy.get('input[type="search"]').type('Tidak Ada peminjam');

    // Cek apakah hasil pencarian kosong
    // cy.contains('No data available').should('be.visible');
    cy.get('#table_mahasiswa').find('tbody tr').should('have.length', 0); 
  });

  it('Test Case 14: Show entries', () => {
  // Ubah jumlah entri yang ditampilkan menjadi 25
  cy.get('select[name="table_mahasiswa_length"]').select('25');
  cy.get('#table_mahasiswa').find('tbody tr').should('have.length.lte', 25);

  // Cek apakah jumlah entri sesuai
  // cy.get('table tbody tr').should('have.length', 25);
  });
  it('Test Case 15: Previous and next page', () => {
    cy.get('#table_mahasiswa_next').click();
    cy.get('#table_mahasiswa_previous').click();
  });
});