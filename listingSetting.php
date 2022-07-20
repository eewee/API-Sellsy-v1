<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Mails
//---------------------------------------------------------------------------

$request = array(
    'method' => 'ListingSetting.getSavedSearches',
    'params' => array(
        'linkedTypes' => ['clients'] // 'agenda,agendaOverview,docitemsinvoice,docitemsestimate,docitemsorder,docitemsproforma,docitemscreditnote,docitemsdelivery,docthirdsinvoice,docthirdsestimate,docthirdsorder,docthirdsproforma,docthirdscreditnote,docthirdsdelivery,docmodels,docinvoices,docestimates,doccreditnotes,docproformas,docdeliveries,docorders,contacts,thirds,clients,suppliers,prospects,mandates,directdebits,items,services,purchases,statDash_sales,statsDashboard,statsContact,statsCatalogue,thirdstats,tasks,tasksOverview,affiliates,remunerations,commissions,accountingcode,tags,catalogstats,docrecurring,docrecurringgenerated,timetrackingentries,thirdtimetrackingentries,payments,thirdpayments,bankDeposits,emails,tickets,itemsdeclinationsfields,customfields,customfieldsgroups,people,ticketsGroups,itemsCategories,promotions,itemspromotions,imports,importLineLog,projectEntries,projectEntriesSupport,projectEntriesProspection,opportunities,scoringEvent,emailBox,emailBoxLinked,cashtillstats,salestats,purdocrows,deadlines,provisions,thirdprovisions,docIntregrityWorkflowLogs,opportunityReport,sourceReport,activityReport,prevSalesReport,corporationInactive,phonecall,stripe_directdebits,purdocorders,purdocdeliveries,purdocinvoices,purdoccreditnotes,docthirdspurOrder,docthirdspurDelivery,docthirdspurInvoice,docthirdspurCreditNote,docitemspurOrder,docitemspurDelivery,docitemspurInvoice,docitemspurCreditNote,puritemsordered,statDash_purchases,statDash_margin,accountingentriessell,accountingentriespurchase,accountingentriescashtill,accountingentriesbank,accountingentriesreconciliated,statDash_timetracking,pipelines,statDash_prospection,stockmoves,itemstockmoves,itemstockserials,stockserials,statDash_stock,statDash_support,cashtills,receipts,receiptsRows,thirdreceipts,receiptsMini,cashtillmoves,statsCashtill,statDash_pos,daily_closings,monthly_closings,yearly_closings,statDash_recurring,docthirdrecurring,docmodelrecurring,campaigns,contactcampaigns,mailinglists,contactmailinglists,mailinglistscontentlist,mailinglistcontentlists,campaignrecipients,projects,entries,thirdproject,expenses,validateExpenses,statDash_expenses,books,thirdbooks,itembooks,availablegoods,itemavailablegoods,propdocs,proptemplates,thirdproposal,opportunityproposal,documentproposal,mails,thirdaccessmandates,transactions'
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
