var app = new Vue({
    el: '#app',
    data: {
        address: '',
        image: ''
    },
    methods: {
        getQRCode() {
            const vm = this;
            
            axios.get('qrcode.php?text=https://'+ this.address +'&size=200&image='+ vm.image)
                .then(function (response) {
                    vm.image = response.data;
                })
                .catch(function (error) {
                    // console.log(error);
                });
        }
    },
    mounted() {
        // Delete all qr code images on start up
        axios.post('deletefiles.php')
            .then(function (response) {
                // console.log(response);
            })
            .catch(function (error) {
                // console.log(error);
            });
    }
})
