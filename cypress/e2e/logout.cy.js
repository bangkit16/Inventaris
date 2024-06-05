describe('Periksa fungsi logout', () => {
  const baseUrl = 'http://127.0.0.1:8000/';

  beforeEach(() => {
    cy.visit(`${baseUrl}login`);
    cy.get('input[name="username"]').type('admin');
    cy.get('input[name="password"]').type('12345');
    cy.get('button[type="submit"]').click();
    cy.visit(`${baseUrl}logout`);
  });

  it('should log out successfully', () => {
    // // Click the logout button or link
    // cy.get('logout').click(); // Adjust the selector to match your logout button/link
    // cy.url().should('include', '/logout');
    // // Ensure the user is redirected to the home page or login page
    // cy.url().should('eq', Cypress.config().baseUrl + '/'); // Adjust based on your application's behavior
    // cy.contains('Login').should('be.visible'); // Ensure the login form or login link is visible
});
});