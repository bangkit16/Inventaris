// describe('template spec', () => {
//   it('passes', () => {
//     cy.visit('https://example.cypress.io')
//   })
// })
describe('Priksa Fungsi Data Barang', () => {
  const baseUrl = 'http://127.0.0.1:8000';

  // Function to bypass login (if needed)
  const bypassLogin = () => {
    cy.visit(baseUrl);
    cy.visit(`${baseUrl}/login`);

    // Periksa apakah elemen input username dan password ada
    cy.get('input[name="username"]').type('jdabukke');
    cy.get('input[name="password"]').type('12345');

    // Klik tombol submit
    cy.get('button[type="submit"]').click();
    // Uncomment and customize the following lines if your application has specific routes or actions to simulate login
    // cy.request('POST', `${baseUrl}/login`, {
    //   username: 'jdabukke',
    //   password: '12345',
    // }).then((response) => {
    //   window.localStorage.setItem('authToken', response.body.token);
    // });
  };

  beforeEach(() => {
    bypassLogin();
  });

  it('Periksa perilaku system saat user memilih menampilkan dashboard', () => {
    cy.visit(`${baseUrl}/`);
    cy.contains('Selamat Datang di Sistem Informasi Inventaris !').should('be.visible');
  });

  it('Periksa perilaku system saat user memilih pinjam barang ', () => {
    cy.visit(`${baseUrl}/`);
    cy.contains('a', 'Pinjam Barang').should('be.visible').and('have.attr', 'href', 'http://127.0.0.1:8000/peminjaman/create');
  });

  it('Periksa perilaku system saat user memilih barang masuk', () => {
    cy.visit(`${baseUrl}/`);
    cy.contains('button', 'Barang Masuk').click();
    cy.get('#modalBarangMasuk').should('be.visible');

    // Fill out and submit the "Barang Masuk" form
    cy.get('#id_barang_masuk').select('1'); // Adjust the value to match your test data
    cy.get('input.form-control[placeholder="stok"]').type('10');

    cy.get('#barangMasuk').submit();

    // Assert that the modal closes after submission
    cy.get('#modalBarangMasuk').should('not.exist');
  });

  it('Periksa perilaku system saat user memilih barang keluar', () => {
    cy.visit(`${baseUrl}/`);
    cy.contains('button', 'Barang Keluar').click();
    cy.get('#modalBarangKeluar').should('be.visible');

    // Fill out and submit the "Barang Keluar" form
    cy.get('#id_barang_keluar').select('1'); // Adjust the value to match your test data
    cy.get('input[name="stok]').type('5');
    cy.get('#barangKeluar').submit();

    // Assert that the modal closes after submission
    cy.get('#modalBarangKeluar').should('not.exist');
  });

  // it('should display the table of items with low stock', () => {
  //   cy.visit(`${baseUrl}/`);
  //   cy.contains('h4', 'Barang dengan stok sedikit').should('be.visible');
  //   cy.get('table').eq(0).within(() => {
  //     cy.get('th').contains('ID').should('be.visible');
  //     cy.get('th').contains('Nama Barang').should('be.visible');
  //     cy.get('th').contains('Stok').should('be.visible');
  //   });
  // });

  // it('should display the table of latest items', () => {
  //   cy.visit(`${baseUrl}/`);
  //   cy.contains('h4', 'Barang terbaru').should('be.visible');
  //   cy.get('table').eq(1).within(() => {
  //     cy.get('th').contains('ID').should('be.visible');
  //     cy.get('th').contains('Nama Barang').should('be.visible');
  //     cy.get('th').contains('Jumlah').should('be.visible');
  //   });
  // });

  // it('should display the table of current borrowings', () => {
  //   cy.visit(`${baseUrl}/`);
  //   cy.contains('h4', 'Peminjaman saat ini').should('be.visible');
  //   cy.get('table').eq(2).within(() => {
  //     cy.get('th').contains('ID').should('be.visible');
  //     cy.get('th').contains('Nama Barang').should('be.visible');
  //     cy.get('th').contains('Mahasiswa').should('be.visible');
  //     cy.get('th').contains('Tanggal Tenggat').should('be.visible');
  //   });
  // });
});