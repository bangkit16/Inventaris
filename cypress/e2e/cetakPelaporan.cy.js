describe('Periksa fungsi cetak laporan', () => {
  const baseUrl = 'http://127.0.0.1:8000/';

  beforeEach(() => {
    cy.visit(`${baseUrl}login`);
    cy.get('input[name="username"]').type('admin');
    cy.get('input[name="password"]').type('12345');
    cy.get('button[type="submit"]').click();
    cy.visit(`${baseUrl}pelaporan`);
  });
  
  it('Test Case 1: Menampilkan cetak pelaporan', () => {
    cy.get('table').should('be.visible');
  });
  it('Test Case 1: Menampilkan cetak laporan barang', () => {
    // cy.get('table').should('be.visible');
    cy.wait(3000);
    cy.get('a[href="' +baseUrl+'pelaporan/barangCsv"]').click();
    cy.wait(10000);
    cy.get('a[href="' +baseUrl+'pelaporan/barangPdf"]').click();
    cy.wait(16000);
    cy.get('a[href="' +baseUrl+'pelaporan/barangExcel"]').click();
    
    const filePathCsv = 'cypress/downloads/barang.csv';
    const filePathPdf = 'cypress/downloads/barang.pdf';
    const filePathExcel = 'cypress/downloads/barang.xlsx';
    // Tentukan URL unduhan dan path untuk menyimpan file
    const downloadUrl = baseUrl+'/pelaporan/barangCsv'; // Sesuaikan dengan URL yang benar
    
    // Unduh file menggunakan plugin cypress-downloadfile
    // cy.downloadFile(downloadUrl, 'cypress/downloads', 'barang.csv');
    
    cy.wait(2000);
    cy.readFile(filePathCsv).should('exist');
    cy.wait(10000);
    cy.readFile(filePathPdf).should('exist');
    cy.wait(16000);
    cy.readFile(filePathExcel).should('exist');

    // Verifikasi bahwa file sudah terdownload
  });

//   it('should have export buttons for Data Barang', () => {
//     // Check if the export buttons for Data Barang are present and functional
//     cy.contains('th', 'Data Barang').should('be.visible');
//     cy.get('a[href="/pelaporan/barangCsv"]').should('be.visible').and('have.text', 'CSV');
//     cy.get('a[href="/pelaporan/barangPdf"]').should('be.visible').and('have.text', 'PDF');
//     cy.get('a[href="/pelaporan/barangExcel"]').should('be.visible').and('have.text', 'Excel');
// });
});