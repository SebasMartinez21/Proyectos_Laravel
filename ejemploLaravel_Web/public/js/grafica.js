function api(){
    const endPoint = "https://fakestoreapi.com/products";

    fetch(endPoint)
    .then(function (response){
        return response.json();
    })
    .then(function (data){
        var categories = [];
        var prices = [];

        for(let i=0; i<data.length; i++){
            categories.push(data[i].category);
            prices.push(data[i].price);
        }

        alert(categories);
        alert(prices);

        var data = [
            {
                x:categories,
                y:prices,
                type:'bar'
            }
        ];
        Plotly.newPlot('grafica', data);
    })
}