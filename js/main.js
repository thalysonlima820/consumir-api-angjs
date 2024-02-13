class Util {
    constructor() {
    }
    
    async haddleHttp(method, url, data = {}, datatype = 'json') {
        try {
            return await new Promise(function (resolve, reject) {
                $.ajax({
                    url: url,
                    method: method,
                    data: data,
                    dataType: datatype,
                    headers: {
                        'Authorization': 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6Mywibm9tZSI6Im5pdmlhIiwiZW1haWwiOiJuaXZpYUBnbWFpbC5jb20iLCJzZW5oYSI6IjIwMmNiOTYyYWM1OTA3NWI5NjRiMDcxNTJkMjM0YjcwIiwidG9rZW4iOiJleUowZVhBaU9pSktWMVFpTENKaGJHY2lPaUpJVXpJMU5pSjkuZXlKcFpDSTZNeXdpYm05dFpTSTZJbTVwZG1saElpd2laVzFoYVd3aU9pSnVhWFpwWVVCbmJXRnBiQzVqYjIwaUxDSnpaVzVvWVNJNkltVXhNR0ZrWXpNNU5EbGlZVFU1WVdKaVpUVTJaVEExTjJZeU1HWTRPRE5sSWl3aWRHOXJaVzRpT2lJaUxDSmpjbVZoZEdWa1gyRjBJam9pTWpBeU5DMHdNaTB4TUZReU1EbzFNVG8wTWk0d01EQXdNREJhSWl3aWRYQmtZWFJsWkY5aGRDSTZJakl3TWoiLCJjcmVhdGVkX2F0IjoiMjAyNC0wMi0xMFQyMDo1MTo0Mi4wMDAwMDBaIiwidXBkYXRlZF9hdCI6IjIwMjQtMDItMTBUMjA6NTQ6MTMuMDAwMDAwWiJ9.5s-vHx9INUTkJGt-88bKag7An_zFcUqFyy094Vkc_j0',
                        'Content-Type': 'application/json'
                    }
                    
                }).done(function (result) {
                    resolve(result);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.error('Ocorreu um erro, errorThrown:', errorThrown);
                    console.error('Ocorreu um erro, status:', textStatus);
                    console.error('Ocorreu um erro, jqXHR:', jqXHR);
                    reject([]);
                });
            });
        } catch (error) {
            console.error('Erro ou resultado vazio:', error);
            return [];
        }
    }
}
