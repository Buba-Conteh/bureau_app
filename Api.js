// let text = document.querySelector('#h');

const fetchQuote = () => {
    fetch("")
        .then(response => {
            return response.json();
        })
        .then(data => {
            //   data.forEach(element => {
            //       console.log(element.quote);
            //       text.innerHTML=element.quote;

            //   });

            // text.innerHTML=data.quoteText;
            console.log(data);


        }
        )
}
fetchQuote();