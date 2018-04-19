const request = require('@request');

describe('User testing', () => {

    let url = 'v1/users/users/';

    test('test Get One User', async () => {
        let { body, statusCode } = await request(`${url}4d06bca6-017e-496b-97d8-dbb6d64dc4ed`);
        expect(statusCode).toEqual(200);
        expect(body).toEqual({
            "id": "4d06bca6-017e-496b-97d8-dbb6d64dc4ed",
            "last_name": "Guillermo",  
            "name": "José", 
            "second_last_name": "Inche"});
    });

});