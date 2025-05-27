(function () {
    //------------------------------------------Dashboard-------------------------------------------------------------
    document.addEventListener("DOMContentLoaded", () => {
        const divCardDashboard = document.getElementById('cardDataDashUsers');
        if (divCardDashboard) {
            showDataDashboard();
            setInterval(() => {
                console.log("Ejecutando showDataDashboard cada 30 segundos...");
                showDataDashboard();
            }, 10000);
        } else {
            console.warn("No se encontró el elemento de datos en el Dashboar de usuario'.");
        }
    });

    function showDataDashboard() {
        if (!navigator.onLine) { // Verifica si hay conexión a Internet
            console.warn("No hay conexión a Internet. Pausando la consulta.");
            //stopFetchingData();
            return;
        }

        const fluxQuery = `
        data = from(bucket: "${bucket}")
          |> range(start: -100y)
       
        battery = data
          |> filter(fn: (r) => r._measurement == "battery")
          |> last()       
       
        gps = data
          |> filter(fn: (r) => r._measurement == "gps")
          |> last()
 
        ambiental = data
          |> filter(fn: (r) => r._measurement == "ambiental")
          |> last()

        accelerometer = data
          |> filter(fn: (r) => r._measurement == "accelerometer")
          |> last()
       
        union(tables: [battery, gps, accelerometer, ambiental])
        `;

        // Ejecutar consulta
        queryApi.queryRows(fluxQuery, {
            next(row, tableMeta) {
                const o = tableMeta.toObject(row)
                console.log(`📊 Medición: ${o._measurement}, Campo: ${o._field}, Valor: ${o._value}`)
                dashArray.push({
                    field: o._field,
                    valor: o._value
                });
            },
            error(error) {
                console.error('❌ Error al consultar InfluxDB:', error)
            },
            complete() {
                const latitud = dashArray.find(c => c.field === "latitud")?.valor || "N/A";
                const longitud = dashArray.find(c => c.field === "longitud")?.valor || "N/A";
                const battery = dashArray.find(c => c.field === "battery")?.valor || "N/A";
                const voltage = dashArray.find(c => c.field === "voltage")?.valor || "N/A";
                const tension = dashArray.find(c => c.field === "tension")?.valor || "N/A";
                const X = dashArray.find(c => c.field === "x_axis")?.valor || 0;
                const Y = dashArray.find(c => c.field === "y_axis")?.valor || 0;
                const Z = dashArray.find(c => c.field === "z_axis")?.valor || 0;
                const temp = dashArray.find(c => c.field === "temperature_C")?.valor || 0;
                const humidity = dashArray.find(c => c.field === "humidity_%")?.valor || 0;
                const pressure = dashArray.find(c => c.field === "pressure_hPa")?.valor || 0;
                dashArray.length = 0;
                document.getElementById("strongDashLat").innerHTML = latitud;
                document.getElementById("strongDashLong").innerHTML = longitud;
                document.getElementById("strongDashBattery").innerHTML = String(battery) + " %";
                document.getElementById("strongDashVoltage").innerHTML = String(voltage) + " V";
                document.getElementById("strongDashTension").innerHTML = String(tension) + " A";
                document.getElementById("strongAccelAxisX").innerHTML = X;
                document.getElementById("strongAccelAxisY").innerHTML = Y;
                document.getElementById("strongAccelAxisZ").innerHTML = Z;
                document.getElementById("envTemperature").textContent = String(temp) + " ºC";
                document.getElementById("envHumidity").textContent = String(humidity) + " %";
                document.getElementById("envPressure").textContent = String(pressure) + " hPa";
                console.log('✅ Consulta finalizada.')
            }
        })
    }

    //------------------------------------------------------------------------------------------------------------------


    const Influx = window['@influxdata/influxdb-client'];
    const InfluxDB = Influx.InfluxDB;
    const QueryApi = Influx.QueryApi;
    const Point = Influx.Point;
    const influxDB = new InfluxDB({
        url: "http://localhost:8086",
        token: "zipJn8ky5txF7NF_rl5IuYEB90CsRbft8UrtvYeXfJef6RPewzFRGw2obLk2tjJ-uueB3oMojTTth6pv_arHRQ=="
    });

    const org = "83d47a18a7edab8b";
    const bucket = "project_ITA";

    const writeApi = influxDB.getWriteApi(org, bucket, "ns");
    const queryApi = influxDB.getQueryApi("83d47a18a7edab8b");

    var bar;
    var barTwo;

    let map;
    let gpsData = [];
    let dashArray = [];
    let accelArray = [];
    let view_bpm = null;
    let view_spo2 = null;
    let healthData = [];
    let currentMarker = null;  // Variable para almacenar el marcador actual
    let currentCircle = null;  // Variable para almacenar el círculo actual

    //------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------Geolocalizacion----------------------------------------------------

    document.addEventListener("DOMContentLoaded", () => {
        // Verificar si el elemento con el ID "mapa" existe
        const mapWeb = document.getElementById('map');
        // Verifica si el div existe
        // Inicializamos el mapa Leaflet
        const map = L.map('map').setView([41.65606, -0.87734], 13); // Vista inicial

        // Agregamos capa base de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
        if (mapWeb) {
            const dateBox = document.getElementById("dateSearchGps");
            console.log(dateBox);
            if (dateBox) {
                console.log("Comprobamos si se puede ver consulta PHP en JAVASCRIPT!!!");
                console.log(window.dataFromPhp);
                const arrayValuesLoc = window.dataFromPhp;
                let lastX = ''; let lastY = '';

                arrayValuesLoc.forEach(obj => {
                    const keyX = Object.keys(obj)[0];
                    const keyY = Object.keys(obj)[1];
                    const x = obj[keyX];
                    const y = obj[keyY];
                    lastX = obj[keyX];
                    lastY = obj[keyY];
                    console.log(`x: ${x}, y: ${y}`);
                    currentMarker = L.marker([x, y])
                        .addTo(map)
                        .bindPopup(`📍 Última ubicación:<br>Lat: ${x}, Lon: ${y}`)
                        .openPopup();
                });

                currentCircle = L.circle([lastX, lastY], {
                    color: 'blue',
                    fillColor: 'blue',
                    fillOpacity: 0.2,
                    radius: 100  // Radio del círculo en metros
                }).addTo(map);
            } else {
                // Ejecutamos gpsTracker
                console.log("Elemento con ID 'mapa' encontrado. Ejecutando gpsTracker...");
                gpsTracker(map);
                // Luego, ejecutamos gpsTracker cada 5 segundos
                setInterval(() => {
                    console.log("Ejecutando gpsTracker cada 5 segundos...");
                    gpsTracker(map);
                }, 60000);
            }
        } else {
            console.warn("No se encontró el elemento con ID 'mapa'.");
        }
    });

    function gpsTracker(map) {
        if (!navigator.onLine) { // Verifica si hay conexión a Internet
            console.warn("No hay conexión a Internet. Pausando la consulta.");
            //stopFetchingData();
            return;
        }

        const query = `from(bucket: "project_ITA")
            |> range(start: -100y)
            |> filter(fn: (r) => r._measurement == "gps")
            |> filter(fn: (r) => r._field == "latitud" or r._field == "longitud" or r._field == "hdop" or r._field == "satellites")
            |> last()`;

        queryApi.queryRows(query, {
            next(row, tableMeta) {
                const obj = tableMeta.toObject(row);
                console.log(obj)
                gpsData.push({
                    field: obj._field, // "latitud" o "longitud"
                    valor: parseFloat(obj._value), // Convertir a número
                    tiempo: new Date(obj._time).toLocaleTimeString() // Timestamp
                });
                console.log(gpsData)
            },
            error(error) {
                console.error("Error al consultar InfluxDB:", error);
            },
            complete() {
                const latitud = gpsData.find(c => c.field === "latitud")?.valor;
                const longitud = gpsData.find(c => c.field === "longitud")?.valor;
                const hdop = gpsData.find(c => c.field === "hdop")?.valor || "N/A";
                const satellites = gpsData.find(c => c.field === "satellites")?.valor || "N/A";
                gpsData.length = 0;

                if (latitud && longitud) {
                    console.log("📍 Última ubicación obtenida:", latitud, longitud);
                    console.log("Precisión del GPS(HDOP): ", hdop)
                    console.log("Satelites encontrados: ", satellites)
                    putPositionToMap(map, latitud, longitud);
                    updateLocationInfo(latitud, longitud, hdop, satellites)
                } else {
                    console.error("❌ No se encontraron coordenadas.");
                }
            }
        });
    }

    function putPositionToMap(map, latitud, longitud) {
        console.log(map);
        if (map && latitud && longitud) {

            if (currentMarker) {
                map.removeLayer(currentMarker);
            }
            if (currentCircle) {
                map.removeLayer(currentCircle);
            }

            // Crear un nuevo marcador
            currentMarker = L.marker([latitud, longitud])
                .addTo(map)
                .bindPopup(`📍 Última ubicación:<br>Lat: ${latitud}, Lon: ${longitud}`)
                .openPopup();

            // Añadir un círculo de zona con un radio de 100 metros
            currentCircle = L.circle([latitud, longitud], {
                color: 'blue',
                fillColor: 'blue',
                fillOpacity: 0.2,
                radius: 100  // Radio del círculo en metros
            }).addTo(map);
        } else {
            console.error("❌ No se pudo agregar el marcador. Verifica el mapa y las coordenadas.");
        }
    }

    function updateLocationInfo(lat, lon, hdop, satellites) {
        const textLat = document.getElementById("textLat");
        const textLong = document.getElementById("textLong");
        const textHdop = document.getElementById("textHdop");
        const textSatellites = document.getElementById("textSatellites");
        if (textLat) {
            textLat.innerHTML = lat;
        } else {
            console.error("❌ No se encontró el contenedor 'textLat'.");
        }
        if (textLong) {
            textLong.innerHTML = lon;
        } else {
            console.error("❌ No se encontró el contenedor 'textLong'.");
        }
        if (textHdop) {
            textHdop.innerHTML = hdop;
        } else {
            console.error("❌ No se encontró el contenedor 'textHdop'.");
        }
        if (textSatellites) {
            textSatellites.innerHTML = satellites;
        } else {
            console.error("❌ No se encontró el contenedor 'textSatellites'.");
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    //------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------Salud(+)-----------------------------------------------------------

    //let dataHealth = [];
    // Comenzar la consulta cuando la página cargue
    document.addEventListener("DOMContentLoaded", () => {
        if (document.getElementById('chart-container')) {
            // 📌 Crear la gráfica
            const chartHealth = document.getElementById("chart-container").getContext("2d");

            // Gradientes más suaves (difuminado hacia abajo)
            // Gradiente rojo suave
            const redFill = chartHealth.createLinearGradient(0, 0, 0, 400);
            redFill.addColorStop(0, "rgba(255, 0, 135, 0.6)");
            redFill.addColorStop(1, "rgba(255, 0, 13, 0.05)");

            // Gradiente azul suave
            const blueFill = chartHealth.createLinearGradient(0, 0, 0, 400);
            blueFill.addColorStop(0, "rgba(0, 221, 255, 0.6)");
            blueFill.addColorStop(1, "rgba(0, 221, 255, 0.05)");

            // 👉 Esta estructura la puedes llenar dinámicamente con tus datos del sensor
            const dataHealth = {
                labels: [],
                datasets: [
                    {
                        label: "LED Rojo",
                        data: [],
                        backgroundColor: redFill,
                        borderColor: "rgba(255, 0, 135, 0.9)",
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 0,
                        pointHoverRadius: 5
                    },
                    {
                        label: "LED IR",
                        data: [],
                        backgroundColor: blueFill,
                        borderColor: "rgba(0, 221, 255, 0.9)",
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 0,
                        pointHoverRadius: 5
                    }
                ]
            };

            const config = {
                type: "line",
                data: dataHealth,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: {
                        duration: 700,
                        easing: 'easeOutQuad'
                    },
                    interaction: {
                        mode: "nearest",
                        axis: "x",
                        intersect: false
                    },
                    plugins: {
                        tooltip: {
                            mode: "index",
                            intersect: false,
                            backgroundColor: "#2a2a2a",
                            titleColor: "#fff",
                            bodyColor: "#eee"
                        },
                        legend: {
                            position: "top",
                            labels: {
                                color: "#333",
                                usePointStyle: true
                            }
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: "Tiempo (s)"
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: "Intensidad de Luz"
                            },
                            min: 0,
                            grid: {
                                color: "rgba(0,0,0,0.05)"
                            }
                        }
                    }
                }
            };


            console.log(chartHealth);
            const graphHealth = new Chart(chartHealth, config);
            actualizeGraphHealth(graphHealth);
            var bar = new ProgressBar.SemiCircle(containerBPM, {
                strokeWidth: 6,
                trailColor: '#eee',
                trailWidth: 1,
                easing: 'easeInOut',
                duration: 1400,
                svgStyle: null,
                text: {
                    value: '',
                    alignToBottom: false
                },
                from: { color: '#0000FF' },
                to: { color: '#FF0000' },
                step: (state, bar) => {
                    var value = Math.round(bar.value() * 100);

                    // Asignar color dinámico
                    let color;
                    if (value < 50) {
                        color = '#0000FF'; // Azul
                    } else if (value < 70) {
                        color = '#00FF00'; // Verde
                    } else {
                        color = '#FF0000'; // Rojo
                    }

                    bar.path.setAttribute('stroke', color);

                    if (value === 0) {
                        bar.setText('');
                    } else {
                        bar.setText(value);
                    }

                    bar.text.style.color = color;
                }
            });

            bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
            bar.text.style.fontSize = '2rem';

            bar.animate(0);  // Number from 0.0 to 1.0

            var barTwo = new ProgressBar.SemiCircle(containerSPO2, {
                strokeWidth: 6,
                trailColor: '#eee',
                trailWidth: 1,
                easing: 'easeInOut',
                duration: 1400,
                svgStyle: null,
                text: {
                    value: '',
                    alignToBottom: false
                },
                from: { color: '#0000FF' },
                to: { color: '#FF0000' },
                step: (state, bar) => {
                    var value = Math.round(bar.value() * 100);

                    // Asignar color dinámico
                    let color;
                    if (value < 40) {
                        color = '#FF0000'; // Rojo
                    } else if (value < 80) {
                        color = '#FFFF00'; // Amarillo
                    } else {
                        color = '#00FF00'; // Verde
                    }

                    bar.path.setAttribute('stroke', color);

                    if (value === 0) {
                        bar.setText('');
                    } else {
                        bar.setText(value);
                    }

                    bar.text.style.color = color;
                }
            });
            barTwo.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
            barTwo.text.style.fontSize = '2rem';

            barTwo.animate(0);  // Number from 0.0 to 1.0
            actualizeGraphHealth(graphHealth, bar, barTwo);
            setInterval(() => {
                console.log("Ejecutando actualizeGraphHealth cada 10 segundos...");
                actualizeGraphHealth(graphHealth, bar, barTwo);
            }, 2000);
        } else {
            console.warn("El elemento chart-container no está presente. No iniciando consulta.");
        }
    });

    function actualizeGraphHealth(graphHealth, bar, barTwo) {
        healthData.length = 0;
        if (!navigator.onLine) { // Verifica si hay conexión a Internet
            console.warn("No hay conexión a Internet. Pausando la consulta.");
            //stopFetchingData();
            return;
        }

        const query = `from(bucket: "project_ITA")
                |> range(start: -100y)
                |> filter(fn: (r) => r._measurement == "health")
                |> filter(fn: (r) => r._field == "ir_value" or r._field == "red_value" or r._field == "bpm" or r._field == "spo2")
                |> last()`;

        queryApi.queryRows(query, {
            next(row, tableMeta) {
                const o = tableMeta.toObject(row)
                console.log(`📊 Medición: ${o._measurement}, Campo: ${o._field}, Valor: ${o._value}`)
                healthData.push({
                    field: o._field,
                    valor: o._value
                });
            },
            error(error) {
                console.error("Error al consultar InfluxDB:", error);
            },
            complete() {
                const ir_value = healthData.find(c => c.field === "ir_value")?.valor;
                const red_value = healthData.find(c => c.field === "red_value")?.valor;
                const bpm = healthData.find(c => c.field === "bpm")?.valor || "N/A";
                const spo2 = healthData.find(c => c.field === "spo2")?.valor || "N/A";

                if (ir_value && red_value) {
                    console.log(red_value);
                    console.log(ir_value);
                    const timestamp = new Date().toLocaleTimeString();
                    graphHealth.data.labels.push(timestamp);
                    graphHealth.data.datasets[0].data.push(red_value);
                    graphHealth.data.datasets[1].data.push(ir_value);

                    // Limitar a 20 puntos para que no crezca infinitamente
                    if (graphHealth.data.labels.length > 20) {
                        graphHealth.data.labels.shift();
                        graphHealth.data.datasets[0].data.shift();
                        graphHealth.data.datasets[1].data.shift();
                    }
                    document.getElementById("red-value").innerHTML = red_value;
                    document.getElementById("ir-value").innerHTML = ir_value;
                    graphHealth.update();
                }

                if (bpm && spo2) {
                    console.log(bpm);
                    console.log(spo2);
                    if ((isNaN(bpm) || bpm == "N/A") && spo2) {
                        bar.animate(0);
                        barTwo.animate(0);
                    } else {
                        if (bpm == 0 || bpm == '0' || isNaN(bpm) || bpm == "N/A") {
                            bar.animate(0);
                        } else {
                            if (bpm >= 100) {
                                view_bpm = 100 / 100;
                            } else {
                                view_bpm = bpm / 100;
                            }
                            bar.animate(view_bpm);
                        }

                        if (spo2 == -999) {
                            barTwo.animate(0);
                        } else {
                            view_spo2 = spo2 / 100;
                            barTwo.animate(view_spo2);
                        }
                    }

                }
            }
        });
    }

    //-----------------------------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------Accelerometer-------------------------------------------

    document.addEventListener("DOMContentLoaded", () => {
        if (document.getElementById('acelerometerGraph')) {
            const accelCtx = document.getElementById("acelerometerGraph").getContext("2d");
            document.getElementById("dog-still").src = "/Assets/img/dog-still.png";
            document.getElementById("dog-walk").src = "/Assets/img/dog-walk.png";

            const accelData = {
                labels: [],
                datasets: [
                    {
                        label: "Eje X",
                        data: [],
                        borderColor: "red",
                        //backgroundColor: "rgb(255, 0, 0)",
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: "Eje Y",
                        data: [],
                        borderColor: "green",
                        //backgroundColor: "rgb(46, 168, 46)",
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: "Eje Z",
                        data: [],
                        borderColor: "blue",
                        //backgroundColor: "rgb(0, 0, 255)",
                        fill: true,
                        tension: 0.4
                    }
                ]
            };

            const accelChart = new Chart(accelCtx, {
                type: "line",
                data: accelData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: "Tiempo"
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: "Aceleración (m/s²)"
                            },
                            min: 0
                        }
                    }
                }
            });
            actualizeDataAcelerometer(accelChart);
            setInterval(() => {
                console.log("Ejecutando actualizeGraphHealth cada 1 segundos...");
                actualizeDataAcelerometer(accelChart);
            }, 2000);

        } else {
            console.warn("La grafica de Acelerometro no está presente. No iniciando consulta.");
        }
    });

    function actualizeDataAcelerometer(graphAccelerometer) {
        if (!navigator.onLine) { // Verifica si hay conexión a Internet
            console.warn("No hay conexión a Internet. Pausando la consulta.");
            //stopFetchingData();
            return;
        }

        const query = `from(bucket: "project_ITA")
            |> range(start: -100y)
            |> filter(fn: (r) => r._measurement == "accelerometer")
            |> filter(fn: (r) => r._field == "x_axis" or r._field == "y_axis" or r._field == "z_axis")
            |> last()`;

        queryApi.queryRows(query, {
            next(row, tableMeta) {
                const obj = tableMeta.toObject(row);
                console.log(obj)
                accelArray.push({
                    field: obj._field,
                    valor: obj._value
                });
                console.log(accelArray)
            },
            error(error) {
                console.error("Error al consultar InfluxDB:", error);
            },
            complete() {
                const X = accelArray.find(c => c.field === "x_axis")?.valor || 0;
                const Y = accelArray.find(c => c.field === "y_axis")?.valor || 0;
                const Z = accelArray.find(c => c.field === "z_axis")?.valor || 0;
                accelArray.length = 0;

                if ((X >= 0) || (Y > 0) || (Z >= 0)) {
                    const timestamp = new Date().toLocaleTimeString();
                    graphAccelerometer.data.labels.push(timestamp);
                    graphAccelerometer.data.datasets[0].data.push(X);
                    graphAccelerometer.data.datasets[1].data.push(Y);
                    graphAccelerometer.data.datasets[2].data.push(Z);

                    // Limitar a 20 puntos para que no crezca infinitamente
                    if (graphAccelerometer.data.labels.length > 20) {
                        graphAccelerometer.data.labels.shift();
                        graphAccelerometer.data.datasets[0].data.shift();
                        graphAccelerometer.data.datasets[1].data.shift();
                        graphAccelerometer.data.datasets[2].data.shift();
                    }
                    document.getElementById("x_axis").innerHTML = X;
                    document.getElementById("y_axis").innerHTML = Y;
                    document.getElementById("z_axis").innerHTML = Z;
                    graphAccelerometer.update();
                }

                if ((X <= 0) || (Y <= 0) || (Z <= 0)) {
                    document.getElementById("dog-walk").style.filter = "opacity(30%)";
                    document.getElementById("dog-still").style.filter = "none";
                    document.getElementById("movementStatus").innerHTML = "💤 En reposo";
                } else {
                    document.getElementById("dog-walk").style.filter = "none";
                    document.getElementById("dog-still").style.filter = "opacity(30%)";
                    document.getElementById("movementStatus").innerHTML = "🐕 En movimiento";
                }
            }

        });
    }

    //-------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------Medioambiental-------------------------------

    document.addEventListener("DOMContentLoaded", () => {

        if (document.getElementById('humidityChart')) {
            // Inicializar gráficos (suponiendo que los canvas ya existen)
            const tempCtx = document.getElementById("tempChart").getContext("2d");
            const humidityCtx = document.getElementById("humidityChart").getContext("2d");
            const pressureCtx = document.getElementById("pressureChart").getContext("2d");

            const tempChart = new Chart(tempCtx, {
                type: "line",
                data: {
                    labels: [],
                    datasets: [{
                        label: "Temperatura (°C)",
                        data: [],
                        borderColor: "rgba(255, 99, 132, 1)",
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: false } }
                }
            });

            const humidityChart = new Chart(humidityCtx, {
                type: "line",
                data: {
                    labels: [],
                    datasets: [{
                        label: "Humedad (%)",
                        data: [],
                        borderColor: "rgba(54, 162, 235, 1)",
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true, max: 100 } }
                }
            });

            const pressureChart = new Chart(pressureCtx, {
                type: "line",
                data: {
                    labels: [],
                    datasets: [{
                        label: "Presión (hPa)",
                        data: [],
                        borderColor: "rgba(255, 206, 86, 1)",
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: false } }
                }
            });

            // Llamar a la función para actualizar datos y poner intervalos
            updateEnvData(tempChart, humidityChart, pressureChart);
            setInterval(() => {
                updateEnvData(tempChart, humidityChart, pressureChart);
            }, 2000);
        } else {
            console.warn("El elemento chart-container no está presente. No iniciando consulta.");
        }
    });

    function updateEnvData(tempChart, humidityChart, pressureChart) {
        if (!navigator.onLine) {
            console.warn("No hay conexión a Internet. Pausando la consulta.");
            return;
        }

        const query = `from(bucket: "project_ITA")
    |> range(start: -100y)
    |> filter(fn: (r) => r._measurement == "ambiental")
    |> filter(fn: (r) => r._field == "temperature_C" or r._field == "humidity_%" or r._field == "pressure_hPa")
    |> last()`;

        let envArray = [];

        queryApi.queryRows(query, {
            next(row, tableMeta) {
                const obj = tableMeta.toObject(row);
                envArray.push({ field: obj._field, valor: obj._value });
            },
            error(error) {
                console.error("Error al consultar InfluxDB:", error);
            },
            complete() {
                const temp = envArray.find(c => c.field === "temperature_C")?.valor || 0;
                const humidity = envArray.find(c => c.field === "humidity_%")?.valor || 0;
                const pressure = envArray.find(c => c.field === "pressure_hPa")?.valor || 0;
                envArray.length = 0;

                const timestamp = new Date().toLocaleTimeString();

                // Actualizar Temperatura
                tempChart.data.labels.push(timestamp);
                tempChart.data.datasets[0].data.push(temp);
                if (tempChart.data.labels.length > 20) {
                    tempChart.data.labels.shift();
                    tempChart.data.datasets[0].data.shift();
                }
                tempChart.update();

                // Actualizar Humedad
                humidityChart.data.labels.push(timestamp);
                humidityChart.data.datasets[0].data.push(humidity);
                if (humidityChart.data.labels.length > 20) {
                    humidityChart.data.labels.shift();
                    humidityChart.data.datasets[0].data.shift();
                }
                humidityChart.update();

                // Actualizar Presión
                pressureChart.data.labels.push(timestamp);
                pressureChart.data.datasets[0].data.push(pressure);
                if (pressureChart.data.labels.length > 20) {
                    pressureChart.data.labels.shift();
                    pressureChart.data.datasets[0].data.shift();
                }
                pressureChart.update();

                document.getElementById("tempValue").innerHTML = temp;
                document.getElementById("humValue").innerHTML = humidity;
                document.getElementById("pressValue").innerHTML = pressure;
            }
        });
    }

})();
