<script>
        let itemSidebar = document.getElementsByClassName('item-sidebar');

        for (let i = 0; i < itemSidebar.length; i++) {
            itemSidebar[i].addEventListener('click', (e) => {
                console.log(document.querySelector(`#${itemSidebar[i].classList[1]}`).classList)
                document.querySelector(`#${itemSidebar[i].classList[1]}`).classList.toggle('hidden')
            })
        }
        //    itemSidebar.addEventListener('click',(e) => {

    </script>
</body>

</html>