let invoices = [
  {
    customer: {
      name: "Coca Cola",
      type: "B2B"
    },
    paid: false,
    items: [
      { subtotal: 1234.44, description: 'asdfg' },
      { subtotal: 5678.88, description: 'qwerty' }
    ]
  },
  {
    customer: {
      name: "Juan Perez",
      type: "B2C"
    },
    paid: false,
    items: [
      { subtotal: 5556.54, description: 'asdfg' },
      { subtotal: 9632.21, description: 'qwerty' }
    ]
  },
  {
    customer: {
      name: "John Smith",
      type: "B2C"
    },
    paid: true,
    items: [
      { subtotal: 1234.44, description: 'asdfg' },
      { subtotal: 5678.88, description: 'qwerty' }
    ]
  },
  {
    customer: {
      name: "Esteban Quito",
      type: "B2C"
    },
    paid: false,
    items: [
      { subtotal: 895.07, description: 'asdfg' },
      { subtotal: 8542.34, description: 'qwerty' },
      { subtotal: 9674.95, description: 'qwerty' }
    ]
  }
];

//Solución con funciones flecha/arrow function
const calculateTotalArrow = (invoice) => {
  return invoice.items.reduce((acc, item) => acc + item.subtotal, 0);
};

// Filtrar facturas no pagadas
const unpaidInvoicesArrow = invoices.filter((invoice) => !invoice.paid);

// Agrupar facturas no pagadas por tipo de cliente y calcular el total adeudado
const totalByCustomerTypeArrow = unpaidInvoicesArrow.reduce((acc, invoice) => {
  const customerType = invoice.customer.type;
  const total = calculateTotalArrow(invoice);

  acc[customerType] = (acc[customerType] || 0) + total;
  return acc;
}, {});

console.log(totalByCustomerTypeArrow);

//Solución con funciones tradicionales
function calculateTotal(invoice) {
  return invoice.items.reduce(function (acc, item) {
    return acc + item.subtotal;
  }, 0);
}

// Función para filtrar facturas no pagadas
function filterUnpaidInvoices(invoice) {
  return !invoice.paid;
}

// Función para calcular el total adeudado por tipo de cliente
function calculateTotalByCustomerType(acc, invoice) {
  const customerType = invoice.customer.type;
  const total = calculateTotal(invoice);

  acc[customerType] = (acc[customerType] || 0) + total;
  return acc;
}

// Filtrar facturas no pagadas
const unpaidInvoices = invoices.filter(filterUnpaidInvoices);

// Calcular el total adeudado por tipo de cliente
const totalByCustomerType = unpaidInvoices.reduce(calculateTotalByCustomerType, {});

console.log(totalByCustomerType);