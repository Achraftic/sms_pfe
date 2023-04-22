


    fetch('/setups/student/class/view', {
        method: 'GET',
    }).then(response => response.json())
      .then(data => {
        console.log(data);
        // Do something with the filtered data
    })
    .catch(error => console.log("error"));


