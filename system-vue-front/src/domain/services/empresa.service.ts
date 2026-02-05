import { api } from './api'
import type { Empresa } from '@/domain/types/empresa.types'

export const EmpresaService = {
    async infoEmpresa() : Promise<Empresa>{
        const response = await api.get('home/infoEmpresa')
        return response.data
    },

    async actualizarEmpresa(empresa: Empresa) : Promise<any>{
        const response = await api.put('home/actualizarEmpresa', empresa)
        return response.data
    },

    async consultarConfiguraciones(codigos: number[]) : Promise<any>{
        const response = await api.get('home/consultarConfiguraciones?codigos='+codigos)
        return response.data
    }

}


