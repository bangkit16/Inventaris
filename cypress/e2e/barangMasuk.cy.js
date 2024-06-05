describe('Periksa fungsi barang masuk', () => {
  const baseUrl = 'http://127.0.0.1:8000/';

  beforeEach(() => {
    cy.visit(`${baseUrl}login`);
    cy.get('input[name="username"]').type('jdabukke');
    cy.get('input[name="password"]').type('12345');
    cy.get('button[type="submit"]').click();
    cy.visit(`${baseUrl}barang_masuk`);
  });

  it('Test Case 1: Menampilkan data barang masuk', () => {
    cy.get('#table_barang_masuk').should('be.visible');
  });


  it('Test Case 2: Mengedit data barang masuk dengan jumlah masuk valid, tanggal transaksi valid, dan status valid', () => {
    cy.get('#table_barang_masuk').find('tbody tr').first().find('.btn-warning').click();
    cy.url().should('include', '/edit');

    cy.get('input[name="barang_masuk"]').clear().type('5');
    cy.get('input[name="tgl_transaksi"]').clear().type('2024-05-26');
    cy.get('input[name="status"]').clear().type('baru');

    cy.get('button[type="submit"]').click();
    cy.get('.swal2-title').should('have.text', 'Data berhasil diubah');
  });

  it('Test Case 3: Mengedit data barang masuk dengan jumlah masuk tidak valid, tanggal transaksi valid, dan status valid', () => {
    cy.get('#table_barang_masuk').find('tbody tr').first().find('.btn-warning').click();
    cy.url().should('include', '/edit');

    cy.get('input[name="barang_masuk"]').clear().type('n');
    cy.get('input[name="tgl_transaksi"]').clear().type('2024-05-27');
    cy.get('input[name="status"]').clear().type('bekas');

    cy.get('button[type="submit"]').click();
    cy.get('.swal2-error').should('be.visible');
  });

  it('Test Case 4: Mengedit data barang masuk dengan jumlah masuk valid, tanggal transaksi tidak valid, dan status valid', () => {
    cy.get('#table_barang_masuk').find('tbody tr').first().find('.btn-warning').click();
    cy.url().should('include', '/edit');

    cy.get('input[name="barang_masuk"]').clear().type('3');
    cy.get('input[name="tgl_transaksi"]').clear();
    cy.get('input[name="status"]').clear().type('baru');

    cy.get('button[type="submit"]').click();
    cy.get('.swal2-error').should('be.visible');
  });

  it('Test Case 5: Mengedit data barang masuk dengan jumlah masuk valid, tanggal transaksi valid, dan status tidak valid', () => {
    cy.get('#table_barang_masuk').find('tbody tr').first().find('.btn-warning').click();
    cy.url().should('include', '/edit');

    cy.get('input[name="barang_masuk"]').clear().type('6');
    cy.get('input[name="tgl_transaksi"]').clear().type('2024-05-27');
    cy.get('input[name="status"]').clear();

    cy.get('button[type="submit"]').click();
    cy.get('.swal2-error').should('be.visible');
  });

  it('Test Case 6: Mengedit data barang masuk dengan jumlah masuk tidak valid, tanggal transaksi tidak valid, dan status tidak valid', () => {
    cy.get('#table_barang_masuk').find('tbody tr').first().find('.btn-warning').click();
    cy.url().should('include', '/edit');

    cy.get('input[name="barang_masuk"]').clear().type('c');
    cy.get('input[name="tgl_transaksi"]').clear();
    cy.get('input[name="status"]').clear();

    cy.get('button[type="submit"]').click();
    cy.get('.swal2-error').should('be.visible');
  });

  it('Test Case 7: Menghapus data barang masuk', () => {
    cy.get('#table_barang_masuk').find('tbody tr').first().find('.btn-danger').click();
    cy.get('.swal2-confirm').click();
    cy.get('.swal2-title').should('have.text', 'Data barang berhasil dihapus');
  });

  it('Test Case 8: Search valid', () => {
    cy.get('input[type="search"]').type('Gergaji');
    cy.get('#table_barang_masuk').should('contain', 'Gergaji');
  });

  it('Test Case 9: Search tidak valid', () => {
    cy.get('input[type="search"]').type('Invalid Search');
    cy.get('#table_barang_masuk').find('tbody tr').should('have.length', 0);
  });

  it('Test Case 10: Filter data barang', () => {
    cy.get('#id_barang').select('Solder');
    cy.get('#table_barang_masuk').should('contain', 'Solder');
cy.wait(4000);
  });

  it('Test Case 11: Show entries', () => {
    cy.get('select[name="table_barang_masuk_length"]').select('25');
    cy.wait(200);
    cy.get('#table_barang_masuk').find('tbody tr').should('have.length', 25);
  });

  it('Test Case 12: Previous and Next Page', () => {
    cy.get('#table_barang_masuk_next').click();
    cy.get('#table_barang_masuk_previous').click();
  });
});
