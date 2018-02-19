-- DROP TABLE public.fiche_metadonnees;
CREATE TABLE public.fiche_metadonnees
(
  id serial, 
  username character varying,
  title_dataset character varying,
  url_dataset character varying,
  abstract character varying,
  keywords character varying,
  dataset_lead_author character varying,
  position_data_author character varying,
  address_data_author character varying,
  email_data_author character varying,
  primary_contact_person character varying,
  position_primary_contact_person character varying,
  address_primary_contact_person character varying,
  email_primary_contact_person character varying,
  organization character varying,
  usage_rights character varying,
  geographic_region character varying,
  ne_latitude float,
  sw_latitude float,
  ne_longitude float,
  sw_longitude float,
  temporal_coverage_begin_date character varying,
  temporal_coverage_end_date character varying,
  general_study_design character varying,
  methods_description character varying,
  laboratory_field_analytical_methods character varying,
  quality_control character varying,
  additional_information character varying
);

GRANT SELECT, INSERT, UPDATE, DELETE ON public.fiche_metadonnees TO postgres;
GRANT USAGE ON SEQUENCE public.fiche_metadonnees_id_seq TO postgres;