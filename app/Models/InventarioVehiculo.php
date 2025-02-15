<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioVehiculo extends Model
{
    use HasFactory;

    protected $table = 'inventarios_vehiculos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'vehiculo_id',
        'autor_id',
        //Sección Llantas (10)
        'llantas_delanteras_derecha_marca',
        'llantas_delanteras_derecha_referencia',
        'llantas_delanteras_izquierda_marca',
        'llantas_delanteras_izquierda_referencia',
        'llantas_traseras_derecha_marca',
        'llantas_traseras_derecha_referencia',
        'llantas_traseras_izquierda_marca',
        'llantas_traseras_izquierda_referencia',
        'llantas_refaccion_marca',
        'llantas_refaccion_referencia',
        //Sección Mecánico (15)
        'mecanico_motor_cant',
        'mecanico_motor_estado',
        'mecanico_check_engine_cant',
        'mecanico_check_engine_estado',
        'mecanico_transmision_cant',
        'mecanico_transmision_estado',
        'mecanico_direccion_cant',
        'mecanico_direccion_estado',
        'mecanico_frenos_cant',
        'mecanico_frenos_estado',
        'mecanico_clutch_cant',
        'mecanico_clutch_estado',
        'mecanico_amortiguadores_cant',
        'mecanico_amortiguadores_estado',
        'mecanico_suspension_cant',
        'mecanico_suspension_estado',
        'mecanico_sistema_escape_cant',
        'mecanico_sistema_escape_estado',
        'mecanico_alineacion_cant',
        'mecanico_alineacion_estado',
        'mecanico_bateria_cant',
        'mecanico_bateria_estado',
        'mecanico_tapa_radiador_cant',
        'mecanico_tapa_radiaador_estado',
        'mecanico_tapa_aceite_cant',
        'mecanico_tapa_aceite_estado',
        'mecanico_varilla_medidora_aceite_cant',
        'mecanico_varilla_medidora_aceite_estado',
        'mecanico_bandas_cant',
        'mecanico_bandas_estado',
        //Seccion Eléctrico (17)
        'electrico_direccionales_cant',
        'electrico_direccionales_estado',
        'electrico_intermitentes_cant',
        'electrico_intermitentes_estado',
        'electrico_faros_niebla_cant',
        'electrico_faros_niebla_estado',
        'electrico_luces_bajas_cant',
        'electrico_luces_bajas_estado',
        'electrico_luces_altas_cant',
        'electrico_luces_altas_estado',
        'electrico_reversa_cant',
        'electrico_reversa_estado',
        'electrico_luces_stop_cant',
        'electrico_luces_stop_estado',
        'electrico_limpiadores_cant',
        'electrico_limpiadores_estado',
        'electrico_antena_cant',
        'electrico_antena_estado',
        'electrico_claxon_cant',
        'electrico_claxon_estado',
        'electrico_alarma_reversa_cant',
        'electrico_alarma_reversa_estado',
        'electrico_torreta_cant',
        'electrico_torreta_estado',
        'electrico_tablero_instrumentos_cant',
        'electrico_tablero_instrumentos_estado',
        'electrico_medidor_gasolina_cant',
        'electrico_medidor_gasolina_estado',
        'electrico_medidor_temperatura_cant',
        'electrico_medidor_temperatura_estado',
        'electrico_medidor_aceite_cant',
        'electrico_medidor_aceite_estado',
        'electrico_calefaccion_clima_cant',
        'electrico_calefaccion_clima_estado',
        //Sección Chasis / Cuerpo auto (16)
        'chasis_faros_cant',
        'chasis_faros_estado',
        'chasis_calaveras_cant',
        'chasis_calaveras_estado',
        'chasis_rines_cant',
        'chasis_rines_estado',
        'chasis_tapones_rines_cant',
        'chasis_tapones_rines_estado',
        'chasis_hojalateria_cant',
        'chasis_hojalateria_estado',
        'chasis_pintura_cant',
        'chasis_pintura_estado',
        'chasis_salpicaderas_cant',
        'chasis_salpicaderas_estado',
        'chasis_puertas_cant',
        'chasis_puertas_estado',
        'chasis_cofre_cant',
        'chasis_cofre_estado',
        'chasis_cajuela_cant',
        'chasis_cajuela_estado',
        'chasis_toldo_cant',
        'chasis_toldo_estado',
        'chasis_defensas_cant',
        'chasis_defensas_estado',
        'chasis_molduras_cant',
        'chasis_molduras_estado',
        'chasis_tumbaburros_cant',
        'chasis_tumbaburros_estado',
        'chasis_estribos_cant',
        'chasis_estribos_estado',
        'chasis_tapon_gasolina_cant',
        'chasis_tapon_gasolina_estado',
        //Sección Vidrios (5)
        'vidrios_medallon_cant',
        'vidrios_medallon_estado',
        'vidrios_cristales_cant',
        'vidrios_cristales_estado',
        'vidrios_parabrisas_cant',
        'vidrios_parabrisas_estado',
        'vidrios_espejo_retrovisor_cant',
        'vidrios_espejo_retrovisor_estado',
        'vidrios_espejos_laterales_cant',
        'vidrios_espejos_laterales_estado',
        //Sección Interiores (13)
        'interiores_vestidura_cant',
        'interiores_vestidura_estado',
        'interiores_tapoceria_cant',
        'interiores_tapiceria_estado',
        'interiores_asientos_cant',
        'interiores_asientos_estado',
        'interiores_apoya_cabezas_cant',
        'interiores_apoya_cabezas_estado',
        'interiores_coderas_laterales_cant',
        'interiores_coderas_laterales_estado',
        'interiores_viceras_cant',
        'interiores_viceras_estado',
        'interiores_guantera_cant',
        'interiores_guantera_estado',
        'interiores_radio_cant',
        'interiores_radio_estado',
        'interiores_reloj_cant',
        'interiores_reloj_estado',
        'interiores_encendedor_cant',
        'interiores_encendedor_estado',
        'interiores_cenicero_cant',
        'interiores_cenicero_estado',
        'interiores_tapetes_cant',
        'interiores_tapetes_estado',
        'interiores_luz_interior_cant',
        'interiores_luz_interior_estado',
        //Sección Seguridad (9)
        'seguridad_cinturon_seguridad_cant',
        'seguridad_cinturon_seguridad_estado',
        'seguridad_caja_herramienta_cant',
        'seguridad_caja_herramienta_estado',
        'seguridad_gato_cant',
        'seguridad_gato_estado',
        'seguridad_llave_cruz_cant',
        'seguridad_llave_cruz_estado',
        'seguridad_triangulo_seguridad_cant',
        'seguridad_triangulo_seguridad_estado',
        'seguridad_cable_pasacorriente_cant',
        'seguridad_cable_pasacorriente_estado',
        'seguridad_extinguidor_cant',
        'seguridad_extinguidor_estado',
        'seguridad_botiquin_cant',
        'seguridad_botiquin_estado',
        'seguridad_linterna_cant',
        'seguridad_linterna_estado',
        //Sección Documentación (4)
        'documentacion_tarjeta_circulacion_cant',
        'documentacion_tarjeta_circulacion_estado',
        'documentacion_poliza_seguro_cant',
        'documentacion_poliza_Seguro_estado',
        'documentacion_manual_cant',
        'documentacion_manual_estado',
        'documentacion_verificacion_cant',
        'documentacion_verificacion_estado',
        //Otros
        'observaciones',
        'ruidos',
        'fugas',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(
            'App\Models\Vehiculo',
            'vehiculo_id',
            'id'
        )
            ->withDefault();
    }

    public function autor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'autor_id',
            'id'
        )
            ->withDefault();
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->setTimezone('America/Mexico_City')->format('Y-m-d H:i:s');
    }
}
