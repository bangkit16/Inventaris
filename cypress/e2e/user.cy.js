describe('Test Case User', () => {
  const baseUrl = 'http://127.0.0.1:8000/';

  beforeEach(() => {
    cy.visit(`${baseUrl}login`);
    cy.get('input[name="username"]').type('admin');
    cy.get('input[name="password"]').type('12345');
    cy.get('button[type="submit"]').click();
    cy.visit(`${baseUrl}user`);
  });

  it('Test Case 1: Menampilkan data user', () => {
      cy.get('table').should('be.visible');
  });

  it('Test Case 2: Menampilkan detail user', () => {
      cy.get('table tbody tr:first-child .btn-info').click();
      cy.url().should('include', '/user/');
  });

  it('Test Case 3: Menambahkan data user dengan username valid, level valid,nama valid, nip valid dan password valid', () => {
      cy.contains('Tambah Data').click();
      cy.url().should('include', '/user/create');

      // Isi form dengan data baru
      cy.get('input[name="username"]').type('user');
      cy.get('#id_level').select('Administrator');
      cy.get('input[name="nama"]').type('Bang');
      cy.get('input[name="nip"]').type('12343255243');
      cy.get('input[name="password"]').type('12345');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil ditambahkan
      cy.get('.swal2-title').should('have.text', 'Data user berhasil disimpan');
      // cy.contains('Data user berhasil disimpan').should('be.visible');
  });

  it('Test Case 4: Menambahkan data user dengan username tidak valid,level valid, nama valid, nip valid dan password valid', () => {
    cy.contains('Tambah Data').click();
    cy.url().should('include', '/user/create');

    // Isi form dengan data baru
    // cy.get('input[name="username"]').type('user');
    cy.get('#id_level').select('Administrator');
    cy.get('input[name="nama"]').type('lili');
    cy.get('input[name="nip"]').type('333333333');
    cy.get('input[name="password"]').type('12345');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil ditambahkan
    cy.get('.swal2-error').should('be.visible');
    // cy.get('.swal2-title').should('have.text', 'Data user berhasil disimpan');
    // cy.contains('Data user berhasil disimpan').should('be.visible');
});

it('Test Case 5: Menambahkan data user dengan username valid, level tidak valid, nama valid, nip valid dan password valid', () => {
    cy.contains('Tambah Data').click();
    cy.url().should('include', '/user/create');

    // Isi form dengan data baru
    cy.get('input[name="username"]').type('user2');
    // cy.get('#id_level').select('Administrator');
    cy.get('input[name="nama"]').type('lili');
    cy.get('input[name="nip"]').type('44444444');
    cy.get('input[name="password"]').type('12345');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil ditambahkan
    cy.get('.swal2-error').should('be.visible');
    // cy.get('.swal2-title').should('have.text', 'Data user berhasil disimpan');
    // cy.contains('Data user berhasil disimpan').should('be.visible');
});

it('Test Case 6: Menambahkan data user dengan username valid, level valid, nama tidak valid, nip valid dan password valid', () => {
    cy.contains('Tambah Data').click();
    cy.url().should('include', '/user/create');

    // Isi form dengan data baru
    cy.get('input[name="username"]').type('user3');
    cy.get('#id_level').select('Administrator');
    // cy.get('input[name="nama"]').type('lili');
    cy.get('input[name="nip"]').type('333333333');
    cy.get('input[name="password"]').type('12345');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil ditambahkan
    cy.get('.swal2-error').should('be.visible');
    // cy.get('.swal2-title').should('have.text', 'Data user berhasil disimpan');
    // cy.contains('Data user berhasil disimpan').should('be.visible');
});

it('Test Case 7: Menambahkan data user dengan username valid, level valid, nama valid, nip tidak valid dan password valid', () => {
    cy.contains('Tambah Data').click();
    cy.url().should('include', '/user/create');

    // Isi form dengan data baru
    cy.get('input[name="username"]').type('user4');
    cy.get('#id_level').select('Administrator');
    cy.get('input[name="nama"]').type('lili');
    cy.get('input[name="nip"]').type('advwsrhet');
    cy.get('input[name="password"]').type('12345');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil ditambahkan
    cy.get('.swal2-error').should('be.visible');
    // cy.get('.swal2-title').should('have.text', 'Data user berhasil disimpan');
    // cy.contains('Data user berhasil disimpan').should('be.visible');
});

it('Test Case 8: Menambahkan data user dengan username valid, level valid, nama valid, nip valid dan password tidak valid', () => {
    cy.contains('Tambah Data').click();
    cy.url().should('include', '/user/create');

    // Isi form dengan data baru
    cy.get('input[name="username"]').type('user5');
    cy.get('#id_level').select('Administrator');
    cy.get('input[name="nama"]').type('lili');
    cy.get('input[name="nip"]').type('advwsrhet');
    // cy.get('input[name="password"]').type('12345');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil ditambahkan
    cy.get('.swal2-error').should('be.visible');
    // cy.get('.swal2-title').should('have.text', 'Data user berhasil disimpan');
    // cy.contains('Data user berhasil disimpan').should('be.visible');
});

it('Test Case 9: Menambahkan data user dengan username tidak valid, level tidak valid, nama tidak valid, nip tidak valid dan password tidak valid', () => {
    cy.contains('Tambah Data').click();
    cy.url().should('include', '/user/create');

    // Isi form dengan data baru
    // cy.get('input[name="username"]').type('user6');
    // cy.get('#id_level').select('Administrator');
    // cy.get('input[name="nama"]').type('lili');
    cy.get('input[name="nip"]').type('advwsrhet');
    // cy.get('input[name="password"]').type('12345');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil ditambahkan
    cy.get('.swal2-error').should('be.visible');
    // cy.get('.swal2-title').should('have.text', 'Data user berhasil disimpan');
    // cy.contains('Data user berhasil disimpan').should('be.visible');
});


  it('Test Case 10: Mengedit data user dengan username valid, level valid, nama valid, nip valid, dan password valid', () => {
      // Klik tombol edit pada data user pertama
      cy.get('table tbody tr:last-child .btn-warning').click();
      cy.url().should('include', '/user/');

      // Ubah data user
      cy.get('input[name="username"]').clear().type('User');
      cy.get('#id_level').select('Admin Jurusan JTI');
      cy.get('input[name="nama"]').clear().type('lala');
      cy.get('input[name="nip"]').clear().type('1234325524323');
      cy.get('input[name="password"]').clear().type('12345');

      // Submit form
      cy.get('form').submit();

      // Cek apakah data berhasil diubah
      cy.contains('Data berhasil diubah').should('be.visible');
  });

  it('Test Case 11: Mengedit data user dengan username tidak valid, level valid, nama valid, nip valid, dan password valid', () => {
    // Klik tombol edit pada data user pertama
    cy.get('table tbody tr:last-child .btn-warning').click();
    cy.url().should('include', '/user/');

    // Ubah data user
    cy.get('input[name="username"]').clear();
    cy.get('#id_level').select('Admin Jurusan JTI');
    cy.get('input[name="nama"]').clear().type('alan');
    cy.get('input[name="nip"]').clear().type('1324647463');
    cy.get('input[name="password"]').clear().type('12345');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil diubah
    cy.get('.swal2-error').should('be.visible');
});

it('Test Case 12: Mengedit data user dengan username valid, level tidak valid, nama valid, nip valid, dan password valid', () => {
    // Klik tombol edit pada data user pertama
    cy.get('table tbody tr:last-child .btn-warning').click();
    cy.url().should('include', '/user/');

    // Ubah data user
    cy.get('input[name="username"]').clear().type('User');
    cy.get('#id_level').select('- Pilih Level -');
    cy.get('input[name="nama"]').clear().type('alan');
    cy.get('input[name="nip"]').clear().type('1324647463');
    cy.get('input[name="password"]').clear().type('12345');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil diubah
    // cy.wait(6000);
    cy.get('.swal2-error').should('be.visible');
    // cy.wait(6000);
    
});

it('Test Case 13: Mengedit data user dengan username valid, level valid, nama tidak valid, nip valid, dan password valid', () => {
    // Klik tombol edit pada data user pertama
    cy.get('table tbody tr:last-child .btn-warning').click();
    cy.url().should('include', '/user/');

    // Ubah data user
    cy.get('input[name="username"]').clear().type('User');
    cy.get('#id_level').select('Admin Jurusan JTI');
    cy.get('input[name="nama"]').clear();
    cy.get('input[name="nip"]').clear().type('1324647463');
    cy.get('input[name="password"]').clear().type('12345');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil diubah
    cy.get('.swal2-error').should('be.visible');
});

it('Test Case 14: Mengedit data user dengan username valid, level valid, nama valid, nip tidak valid, dan password valid', () => {
    // Klik tombol edit pada data user pertama
    cy.get('table tbody tr:last-child .btn-warning').click();
    cy.url().should('include', '/user/');

    // Ubah data user
    cy.get('input[name="username"]').clear().type('User');
    cy.get('#id_level').select('Admin Jurusan JTI');
    cy.get('input[name="nama"]').clear().type('alan');
    cy.get('input[name="nip"]').clear();
    cy.get('input[name="password"]').clear().type('12345');

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil diubah
    cy.get('.swal2-error').should('be.visible');
});

it('Test Case 15: Mengedit data user dengan username valid, level valid, nama valid, nip valid, dan password tidak valid', () => {
    // Klik tombol edit pada data user pertama
    cy.get('table tbody tr:last-child .btn-warning').click();
    cy.url().should('include', '/user/');

    // Ubah data user
    cy.get('input[name="username"]').clear().type('User');
    cy.get('#id_level').select('Admin Jurusan JTI');
    cy.get('input[name="nama"]').clear().type('alan');
    cy.get('input[name="nip"]').clear().type('1324647463');
     cy.get('input[name="password"]').clear();

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil diubah
    // cy.wait(6000);
    cy.get('.swal2-title').should('be.visible');
    // cy.wait(6000);
    
});

it('Test Case 16: Mengedit data user dengan username tidak valid, level tidak valid, nama tidak valid, nip tidak valid, dan password tidak valid', () => {
    // Klik tombol edit pada data user pertama
    cy.get('table tbody tr:last-child .btn-warning').click();
    cy.url().should('include', '/user/');

    // Ubah data user
    cy.get('input[name="username"]').clear();
    // cy.get('#id_level').select('Admin Jurusan JTI');
    cy.get('input[name="nama"]').clear();
    cy.get('input[name="nip"]').clear();
    cy.get('input[name="password"]').clear();

    // Submit form
    cy.get('form').submit();

    // Cek apakah data berhasil diubah
    cy.get('.swal2-error').should('be.visible');
});

  it('Test Case 17: Menghapus data user', () => {
      // Simpan jumlah data sebelum penghapusan
      cy.get('select[name="table_user_length"]').select('25');
      let rowCountBeforeDelete;
      cy.get('table tbody tr').then(($rows) => {
          rowCountBeforeDelete = $rows.length;
      });

      cy.get('#table_user').find('tbody tr').last().find('.btn-danger').click();
      cy.get('.swal2-confirm').click();
      cy.get('.swal2-title').should('have.text', 'Data user berhasil dihapus');   

  });

  it('Test Case 18: Search valid', () => {
      // Ketik kata kunci pencarian
      cy.get('input[type="search"]').type('jdabukke');

      // Cek apakah hasil pencarian sesuai
      cy.get('table tbody tr').should('contain', 'jdabukke');
  });

  it('Test Case 19: Search tidak valid', () => {
      // Ketik kata kunci pencarian yang tidak ada
      cy.get('input[type="search"]').type('Tidak Ada User');

      // Cek apakah hasil pencarian kosong
      // cy.contains('No data available').should('be.visible');
      cy.get('#table_user').find('tbody tr').should('have.length', 0);
  });

  it('Test Case 20: Show entries', () => {
      // Ubah jumlah entri yang ditampilkan menjadi 25
      cy.get('select[name="table_user_length"]').select('25');
      cy.get('#table_user').find('tbody tr').should('have.length.lte', 25);

      // Cek apakah jumlah entri sesuai
      // cy.get('table tbody tr').should('have.length', 25);
  });
  it('Test Case 21: Filter User', () => {
    cy.get('#id_level').select('Administrator');
    cy.get('#table_user').should('contain', 'Administrator');
  });

  // it('Test Case 9: Previous and Next page', () => {
  //     // Klik tombol Next
  //     cy.contains('Next').click();

  //     // Cek apakah halaman berikutnya tampil
  //     cy.get('.paginate_button.next.disabled').should('not.exist');

  //     // Klik tombol Previous
  //     cy.contains('Previous').click();

  //     // Cek apakah kembali ke halaman sebelumnya
  //     cy.get('.paginate_button.previous.disabled').should('not.exist');
  // });
});
