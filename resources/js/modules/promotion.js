import axios from 'axios'
document.addEventListener('DOMContentLoaded', async() => {
    if (import.meta.env.VITE_APP_ENV !== 'production') return

    const prevAds = document.querySelector('#prev-ads')
    const nextAds = document.querySelector('#next-ads')
    if (prevAds || nextAds) {
        try {
            const { data: main } = await axios.get('/api/v1/promotions?type=1&limit=2')
            for (let i = 0; i < main.data.length; i++) {
                const item = main.data[i]

                let img = document.createElement('img')
                img.src = item.cover_image
                img.alt = item.title

                if (i === 0) {
                    prevAds.href = '/promotions/' + item.id
                    prevAds.title = item.title
                    prevAds.appendChild(img)
                    prevAds.classList.remove('loader')
                } else {
                    nextAds.href = '/promotions/' + item.id
                    nextAds.title = item.title
                    nextAds.appendChild(img)
                    nextAds.classList.remove('loader')
                }
            }
        } catch (e) {
            console.log(e)
        }
    }

    const rentAds = document.querySelector('#rent-ads')
    if (rentAds) {
        try {
            const { data: main } = await axios.get('/api/v1/promotions?type=5&limit=1')
            for (let i = 0; i < main.data.length; i++) {
                const item = main.data[i]

                let img = document.createElement('img')
                img.className = 'card-img'
                img.src = item.cover_image
                img.alt = item.title

                rentAds.href = '/promotions/' + item.id
                rentAds.title = item.title

                let span = document.createElement('span');
                span.className = 'bg-dark badge position-absolute top-0 start-0'
                span.textContent = item.title

                rentAds.appendChild(span)

                rentAds.appendChild(img)
                rentAds.classList.remove('loader')
            }
        } catch (error) {
            console.log(error)
            const el = document.querySelector('.rent-ads')
            if (el) {
                el.classList.remove('d-none')
            }
        }
    }

    const omnibus = document.querySelector('#omnibus')
    if (omnibus) {
        try {
            const { data: main } = await axios.get('/api/v1/promotions?type=2&limit=5')
            for (let i = 0; i < main.data.length; i++) {
                const item = main.data[i]

                let link = document.createElement('a')
                link.target = '_blank'
                link.className = i > 0 ? 'card mt-3' : 'card'
                link.href = '/promotions/' + item.id
                link.title = item.title

                let img = document.createElement('img')
                img.className = 'card-img'
                img.src = item.cover_image
                img.alt = item.title

                let span = document.createElement('span');
                span.className = 'bg-dark badge position-absolute top-0 start-0'
                span.textContent = item.title

                link.appendChild(span)

                link.appendChild(img)

                omnibus.appendChild(link)
            }
            omnibus.classList.remove('loader')
        } catch (error) {
            console.log(error)
        }
    }
})
