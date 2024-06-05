// describe('template spec', () => {
//   it('passes', () => {
//     cy.visit('http://127.0.0.1:8000/')
//   })
// })
describe('Priksa Fungsi Login', () => {
  // Base URL aplikasi
  const baseUrl = 'http://127.0.0.1:8000';

  it('Periksa perilaku sistem saat Username dan Password yang valid dimasukkan.', () => {
    // Kunjungi halaman login
    cy.visit(`${baseUrl}/login`);

    // Periksa apakah elemen input username dan password ada
    cy.get('input[name="username"]').type('jdabukke');
    cy.get('input[name="password"]').type('12345');

    // Klik tombol submit
    cy.get('button[type="submit"]').click();

    // Periksa apakah diarahkan ke halaman dashboard
    cy.url().should('eq', `${baseUrl}/`);
  });

  it('Periksa perilaku sistem saat Username tidak valid dan Password yang valid dimasukkan', () => {
    // Kunjungi halaman login
    cy.visit(`${baseUrl}/login`);

    // Isi form dengan kredensial yang salah
    cy.get('input[name="username"]').type('jdaduko');
    cy.get('input[name="password"]').type('12345');

    // Klik tombol submit
    cy.get('button[type="submit"]').click();

    // Periksa apakah pesan error muncul
    cy.get('.error-message').should('be.visible')
      .and('contain', 'Login Gagal');
  });

  it('Periksa perilaku sistem saat Username Valid dan Password yang tidak valid dimasukkan.', () => {
    // Kunjungi halaman login
    cy.visit(`${baseUrl}/login`);

    // Isi form dengan kredensial yang benar
    cy.get('input[name="username"]').type('jdabukke');
    cy.get('input[name="password"]').type('123456');

    // Klik tombol submit
    cy.get('button[type="submit"]').click();

    // Periksa apakah pesan error muncul
    cy.get('.error-message').should('be.visible')
      .and('contain', 'Login Gagal');
  });
  it('Periksa perilaku sistem saat Username tidak Valid dan Password yang tidak valid dimasukkan', () => {
    // Kunjungi halaman login
    cy.visit(`${baseUrl}/login`);

    // Isi form dengan kredensial yang benar
    cy.get('input[name="username"]').type('jdabuko');
    cy.get('input[name="password"]').type('123456');

    // Klik tombol submit
    cy.get('button[type="submit"]').click();

    // Periksa apakah pesan error muncul
    cy.get('.error-message').should('be.visible')
      .and('contain', 'Login Gagal');
  });
});

// describe('Inventory Management System', () => {
//   const baseUrl = 'http://127.0.0.1:8000';

//   // Function to bypass login (if needed)
//   const bypassLogin = () => {
//     cy.visit(baseUrl);
//     cy.visit(`${baseUrl}/login`);

//     // Periksa apakah elemen input username dan password ada
//     cy.get('input[name="username"]').type('jdabukke');
//     cy.get('input[name="password"]').type('12345');

//     // Klik tombol submit
//     cy.get('button[type="submit"]').click();
//     // Uncomment and customize the following lines if your application has specific routes or actions to simulate login
//     // cy.request('POST', `${baseUrl}/login`, {
//     //   username: 'jdabukke',
//     //   password: '12345',
//     // }).then((response) => {
//     //   window.localStorage.setItem('authToken', response.body.token);
//     // });
//   };

//   beforeEach(() => {
//     bypassLogin();
//   });

//   it('should display the welcome message', () => {
//     cy.visit(`${baseUrl}/`);
//     cy.contains('Selamat Datang di Sistem Informasi Inventaris !').should('be.visible');
//   });

//   it('should display the "Pinjam Barang" button', () => {
//     cy.visit(`${baseUrl}/`);
//     cy.contains('a', 'Pinjam Barang').should('be.visible').and('have.attr', 'href', '/peminjaman/create');
//   });

//   it('should open the "Barang Masuk" modal and submit the form', () => {
//     cy.visit(`${baseUrl}/`);
//     cy.contains('button', 'Barang Masuk').click();
//     cy.get('#modalBarangMasuk').should('be.visible');

//     // Fill out and submit the "Barang Masuk" form
//     cy.get('#id_barang_masuk').select('1'); // Adjust the value to match your test data
//     cy.get('input[name="stok"]').type('10');
//     cy.get('#barangMasuk').submit();

//     // Assert that the modal closes after submission
//     cy.get('#modalBarangMasuk').should('not.exist');
//   });

//   it('should open the "Barang Keluar" modal and submit the form', () => {
//     cy.visit(`${baseUrl}/`);
//     cy.contains('button', 'Barang Keluar').click();
//     cy.get('#modalBarangKeluar').should('be.visible');

//     // Fill out and submit the "Barang Keluar" form
//     cy.get('#id_barang_keluar').select('1'); // Adjust the value to match your test data
//     cy.get('input[name="stok"]').type('5');
//     cy.get('#barangKeluar').submit();

//     // Assert that the modal closes after submission
//     cy.get('#modalBarangKeluar').should('not.exist');
//   });

//   it('should display the table of items with low stock', () => {
//     cy.visit(`${baseUrl}/`);
//     cy.contains('h4', 'Barang dengan stok sedikit').should('be.visible');
//     cy.get('table').eq(0).within(() => {
//       cy.get('th').contains('ID').should('be.visible');
//       cy.get('th').contains('Nama Barang').should('be.visible');
//       cy.get('th').contains('Stok').should('be.visible');
//     });
//   });

//   it('should display the table of latest items', () => {
//     cy.visit(`${baseUrl}/`);
//     cy.contains('h4', 'Barang terbaru').should('be.visible');
//     cy.get('table').eq(1).within(() => {
//       cy.get('th').contains('ID').should('be.visible');
//       cy.get('th').contains('Nama Barang').should('be.visible');
//       cy.get('th').contains('Jumlah').should('be.visible');
//     });
//   });

//   it('should display the table of current borrowings', () => {
//     cy.visit(`${baseUrl}/`);
//     cy.contains('h4', 'Peminjaman saat ini').should('be.visible');
//     cy.get('table').eq(2).within(() => {
//       cy.get('th').contains('ID').should('be.visible');
//       cy.get('th').contains('Nama Barang').should('be.visible');
//       cy.get('th').contains('Mahasiswa').should('be.visible');
//       cy.get('th').contains('Tanggal Tenggat').should('be.visible');
//     });
//   });
// });

