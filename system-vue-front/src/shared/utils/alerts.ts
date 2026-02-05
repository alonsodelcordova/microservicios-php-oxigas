import Swal from 'sweetalert2'

export const alertSuccess = (title: string, text?: string) => {
  return Swal.fire({
    icon: 'success',
    title,
    text,
    timer: 1500,
    showConfirmButton: false
  })
}

export const alertError = (title: string, text?: string) => {
  return Swal.fire({
    icon: 'error',
    title,
    text
  })
}

export const alertInfo = (title: string, text?: string) => {
  return Swal.fire({
    icon: 'info',
    title,
    text
  })
}

export const alertConfirm = (
  title: string,
  text: string,
  confirmText = 'Sí',
  cancelText = 'Cancelar'
) => {
  return Swal.fire({
    icon: 'warning',
    title,
    text,
    showCancelButton: true,
    confirmButtonText: confirmText,
    cancelButtonText: cancelText
  })
}
