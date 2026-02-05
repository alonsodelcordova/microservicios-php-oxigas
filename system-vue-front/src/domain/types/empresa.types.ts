 
export interface Empresa {
    nombre: string;
    ident_fiscal: string;
    direccion: string;
    moneda: string;
    zona_horaria: string;
    is_alert_inventar_bajo: boolean;
    is_modo_offline: boolean;
}

export interface Configuracion {
    cod_prim: number;
    cod_sec: string;
    nombre: string;
    descripcion: string;
    valor_int: number;
    valor_decimal: number;
    valor_str: string;
    estado: boolean;
    fecha_registro: string;
}

export const DIGIDES = {
  'MONEDAS':1,
  'ZONA_HORARIA':2,
  'TIPO_DOCUMENTO':3,
  'TIPO_MOVIMIENTO':4,
  'ROL':5
}
