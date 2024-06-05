describe('Periksa fungsi transaksi denda', () => {
  const baseUrl = 'http://127.0.0.1:8000/';

  beforeEach(() => {
    cy.visit(`${baseUrl}login`);
    cy.get('input[name="username"]').type('jdabukke');
    cy.get('input[name="password"]').type('12345');
    cy.get('button[type="submit"]').click();
    cy.visit(`${baseUrl}denda`);
  });

  it('Test Case 1: Menampilkan data transaksi denda', () => {
    cy.get('table').should('be.visible');
  });

  it('Test Case 2: Menampilkan detail data transaksi denda', () => {
    cy.get('table tbody tr:first-child .btn-info').click();
    cy.url().should('include', '/denda/');
  });

  it('Test Case 3: Mengedit data transaksi denda dengan keterangan valid', () => {
    // Klik tombol edit pada data user pertama
    cy.get('table tbody tr:last-child .btn-warning').click();
    cy.url().should('include', '/denda/');

    // Ubah data user
    cy.get('input[name="keterangan"]').clear().type('Kompen 2 Jam');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil diubah
    cy.contains('Data berhasil diubah').should('be.visible');
  });

  it('Test Case 4: Mengedit data transaksi denda dengan keterangan tidak valid', () => {
    // Klik tombol edit pada data user pertama
    cy.get('table tbody tr:last-child .btn-warning').click();
    cy.url().should('include', '/denda/');

    // Ubah data user
    cy.get('input[name="keterangan"]').clear();

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil diubah
    //cy.contains('Data berhasil diubah').should('be.visible');
    //cy.get('.swal2-error').should('be.visible');
    cy.get('.swal2-error').should('be.visible');
  });


  it('Test Case 5: Search valid', () => {
    // Ketik kata kunci pencarian
    cy.get('input[type="search"]').type('Darmanto');

    // Cek apakah hasil pencarian sesuai
    cy.get('table tbody tr').should('contain', 'Darmanto');
});

  it('Test Case 6: Search tidak valid', () => {
    // Ketik kata kunci pencarian yang tidak ada
    cy.get('input[type="search"]').type('Tidak Ada peminjam');

    // Cek apakah hasil pencarian kosong
    // cy.contains('No data available').should('be.visible');
    cy.get('#table_denda').find('tbody tr').should('have.length', 0); 
  });
  it('Test Case 7: Show entries', () => {
    // Ubah jumlah entri yang ditampilkan menjadi 25
    cy.get('select[name="table_denda_length"]').select('25');
    cy.get('#table_denda').find('tbody tr').should('have.length.lte', 25);
  
    // Cek apakah jumlah entri sesuai
    // cy.get('table tbody tr').should('have.length', 25);
    });
  it('Test Case 8: previous and next page', () => {
      cy.get('#table_denda_next').click();
      cy.get('#table_denda_previous').click();
  });
});