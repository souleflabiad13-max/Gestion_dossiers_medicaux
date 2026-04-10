// supabase.js
import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';

const SUPABASE_URL = 'https://uuhdpvtnfaycqemhrelo.supabase.co';
const SUPABASE_ANON_KEY = 'sb_publishable_C-QCOapZ_QY92foN_Q-VRw_3WSoCos7';

export const supabase = createClient(SUPABASE_URL, SUPABASE_ANON_KEY);