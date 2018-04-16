const request = require('@request');

test('carga de la pagina', async() => {
    let data = await request('v1/users/users/4d06bca6-017e-496b-97d8-dbb6d64dc4ed');
    expect(data.statusCode).toEqual(200);
});